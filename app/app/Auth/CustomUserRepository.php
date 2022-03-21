<?php

declare(strict_types=1);

namespace App\Auth;

class CustomUserRepository implements \Auth0\Laravel\Contract\Auth\User\Repository
{
    /**
     * @inheritdoc
     *
     * @phpcsSuppress SlevomatCodingStandard.Functions.UnusedParameter
     */
    public function fromSession(
        array $user
    ): ?\Illuminate\Contracts\Auth\Authenticatable {
        // Unused in this quickstart example.
        return null;
    }

    /**
     * @inheritdoc
     */
    public function fromAccessToken(
        array $user
    ): ?\Illuminate\Contracts\Auth\Authenticatable {
        return new \App\Models\User([
            'id' => $user['sub'] ?? $user['user_id'] ?? null,
            'name' => $user['name'],
            'email' => $user['email'],
        ]);
    }
}
