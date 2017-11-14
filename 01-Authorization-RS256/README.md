# Laravel Authorization for RS256-Signed Tokens

This sample demonstrates how to protect endpoints in a Laravel API by verifying an incoming JWT access token signed by Auth0. The token must be signed with the RS256 algorithm and must be verified against your Auth0 JSON Web Key Set.

## Getting Started

You will need `composer` to install dependencies. 

```bash
composer install
```

After that, you need to create `.env` file (use `.env.example` as an example). Make sure you don't forget to fill out with keys `AUTH0_DOMAIN` and `AUTH0_AUDIENCE`. You don't need to change the values for `AUTH0_CLIENT_ID`, `AUTH0_CLIENT_SECRET`, `AUTH0_CALLBACK_URL`, but don't delete the entries.

Use `php artisan key:generate` to generate your APP_KEY.

Run the application with `php artisan serve --port=3010`.

## Running the example with Docker

If you want to run with [Docker](https://www.docker.com/) you need to create `.env` file and fill out with the keys as explained [previously](#getting-started).

Execute in command line `sh exec.sh` to run the Docker in Linux, or `.\exec.ps1` to run the Docker in Windows.

## What is Auth0?

Auth0 helps you to:

* Add authentication with [multiple authentication sources](https://docs.auth0.com/identityproviders), either social like **Google, Facebook, Microsoft Account, LinkedIn, GitHub, Twitter, Box, Salesforce, amont others**, or enterprise identity systems like **Windows Azure AD, Google Apps, Active Directory, ADFS or any SAML Identity Provider**.
* Add authentication through more traditional **[username/password databases](https://docs.auth0.com/mysql-connection-tutorial)**.
* Add support for **[linking different user accounts](https://docs.auth0.com/link-accounts)** with the same user.
* Support for generating signed [Json Web Tokens](https://docs.auth0.com/jwt) to call your APIs and **flow the user identity** securely.
* Analytics of how, when and where users are logging in.
* Pull data from other sources and add it to the user profile, through [JavaScript rules](https://docs.auth0.com/rules).

## Create a free Auth0 account

1. Go to [Auth0](https://auth0.com/signup) and click Sign Up.
2. Use Google, GitHub or Microsoft Account to login.

## Issue Reporting

If you have found a bug or if you have a feature request, please report them at this repository issues section. Please do not report security vulnerabilities on the public GitHub issue tracker. The [Responsible Disclosure Program](https://auth0.com/whitehat) details the procedure for disclosing security issues.

## Author

[Auth0](https://auth0.com)

## License

This project is licensed under the MIT license. See the `LICENSE` file for more info.
