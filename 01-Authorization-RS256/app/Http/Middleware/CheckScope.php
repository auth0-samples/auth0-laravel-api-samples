<?php

namespace App\Http\Middleware;

use Auth0\Login\Contract\Auth0UserRepository;
use Auth0\SDK\Exception\CoreException;
use Auth0\SDK\Exception\InvalidTokenException;
use Closure;

class CheckScope
{
    protected $userRepository;

    /**
     * CheckScope constructor.
     *
     * @param Auth0UserRepository $userRepository
     */
    public function __construct(Auth0UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  \string  $scope
     * @return mixed
     */
    public function handle($request, Closure $next, $scope)
    {
        $auth0 = \App::make('auth0');

        $accessToken = $request->bearerToken();
        try {
            $tokenInfo = $auth0->decodeJWT($accessToken);
            $user = $this->userRepository->getUserByDecodedJWT($tokenInfo);
            if (!$user) {
                return response()->json(["message" => "Unauthorized user"], 401);
            }

            if($scope) {
                $hasScope = false;
                if(isset($tokenInfo->scope)) {
                    $scopes = explode(" ", $tokenInfo->scope);
                    foreach ($scopes as $s) {
                        if ($s === $scope)
                            $hasScope = true;
                    }
                }
                if(!$hasScope)
                    return response()->json(["message" => "Insufficient scope"], 403);

                \Auth::login($user);
            }
        } catch (CoreException $e) {
            return response()->json(["message" => $e->getMessage()], 401);
        } catch (InvalidTokenException $e) {
            return response()->json(["message" => $e->getMessage()], 401);
        }

        return $next($request);
    }
}
