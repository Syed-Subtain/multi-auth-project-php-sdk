
# Getting Started with MultiAuth-Sample

## Introduction

API for Markdown Notes app.

## Install the Package

Run the following command to install the package and automatically add the dependency to your composer.json file:

```php
composer require "apimatic/multi-auth-project-sdk:1.0.0"
```

Or add it to the composer.json file manually as given below:

```php
"require": {
    "apimatic/multi-auth-project-sdk": "1.0.0"
}
```

You can also view the package at:
https://packagist.org/packages/apimatic/multi-auth-project-sdk#1.0.0

## Test the SDK

Unit tests in this SDK can be run using PHPUnit.

1. First install the dependencies using composer including the `require-dev` dependencies.
2. Run `vendor\bin\phpunit --verbose` from commandline to execute tests. If you have installed PHPUnit globally, run tests using `phpunit --verbose` instead.

You can change the PHPUnit test configuration in the `phpunit.xml` file.

## Initialize the API Client

**_Note:_** Documentation for the client can be found [here.](https://www.github.com/Syed-Subtain/multi-auth-project-php-sdk/tree/1.0.0/doc/client.md)

The following parameters are configurable for the API Client:

| Parameter | Type | Description |
|  --- | --- | --- |
| `accessToken2` | `string` |  |
| `port` | `string` | *Default*: `'80'` |
| `suites` | `int(SuiteCodeEnum)` | *Default*: `SuiteCodeEnum::HEARTS` |
| `environment` | Environment | The API environment. <br> **Default: `Environment.TESTING`** |
| `timeout` | `int` | Timeout for API calls in seconds.<br>*Default*: `0` |
| `enableRetries` | `bool` | Whether to enable retries and backoff feature.<br>*Default*: `false` |
| `numberOfRetries` | `int` | The number of retries to make.<br>*Default*: `0` |
| `retryInterval` | `float` | The retry time interval between the endpoint calls.<br>*Default*: `1` |
| `backOffFactor` | `float` | Exponential backoff factor to increase interval between retries.<br>*Default*: `2` |
| `maximumRetryWaitTime` | `int` | The maximum wait time in seconds for overall retrying requests.<br>*Default*: `0` |
| `retryOnTimeout` | `bool` | Whether to retry on request timeout.<br>*Default*: `true` |
| `httpStatusCodesToRetry` | `array` | Http status codes to retry against.<br>*Default*: `408, 413, 429, 500, 502, 503, 504, 521, 522, 524` |
| `httpMethodsToRetry` | `array` | Http methods to retry against.<br>*Default*: `'GET', 'PUT'` |
| `basicAuthCredentials` | [`BasicAuthCredentials`](https://www.github.com/Syed-Subtain/multi-auth-project-php-sdk/tree/1.0.0/doc/$a/https://www.github.com/Syed-Subtain/multi-auth-project-php-sdk/tree/1.0.0/basic-authentication.md) | The Credentials Setter for Basic Authentication |
| `apiKeyCredentials` | [`ApiKeyCredentials`](https://www.github.com/Syed-Subtain/multi-auth-project-php-sdk/tree/1.0.0/doc/$a/https://www.github.com/Syed-Subtain/multi-auth-project-php-sdk/tree/1.0.0/custom-query-parameter.md) | The Credentials Setter for Custom Query Parameter |
| `apiHeaderCredentials` | [`ApiHeaderCredentials`](https://www.github.com/Syed-Subtain/multi-auth-project-php-sdk/tree/1.0.0/doc/$a/https://www.github.com/Syed-Subtain/multi-auth-project-php-sdk/tree/1.0.0/custom-header-signature.md) | The Credentials Setter for Custom Header Signature |
| `oAuthCCGCredentials` | [`OAuthCCGCredentials`](https://www.github.com/Syed-Subtain/multi-auth-project-php-sdk/tree/1.0.0/doc/$a/https://www.github.com/Syed-Subtain/multi-auth-project-php-sdk/tree/1.0.0/oauth-2-client-credentials-grant.md) | The Credentials Setter for OAuth 2 Client Credentials Grant |
| `oAuthACGCredentials` | [`OAuthACGCredentials`](https://www.github.com/Syed-Subtain/multi-auth-project-php-sdk/tree/1.0.0/doc/$a/https://www.github.com/Syed-Subtain/multi-auth-project-php-sdk/tree/1.0.0/oauth-2-authorization-code-grant.md) | The Credentials Setter for OAuth 2 Authorization Code Grant |
| `oAuthROPCGCredentials` | [`OAuthROPCGCredentials`](https://www.github.com/Syed-Subtain/multi-auth-project-php-sdk/tree/1.0.0/doc/$a/https://www.github.com/Syed-Subtain/multi-auth-project-php-sdk/tree/1.0.0/oauth-2-resource-owner-credentials-grant.md) | The Credentials Setter for OAuth 2 Resource Owner Credentials Grant |
| `oAuthBearerTokenCredentials` | [`OAuthBearerTokenCredentials`](https://www.github.com/Syed-Subtain/multi-auth-project-php-sdk/tree/1.0.0/doc/$a/https://www.github.com/Syed-Subtain/multi-auth-project-php-sdk/tree/1.0.0/oauth-2-bearer-token.md) | The Credentials Setter for OAuth 2 Bearer token |

The API client can be initialized as follows:

```php
$client = MultiAuthSampleClientBuilder::init()
    ->basicAuthCredentials(
        BasicAuthCredentialsBuilder::init(
            'Username',
            'Password'
        )
    )
    ->apiKeyCredentials(
        ApiKeyCredentialsBuilder::init(
            'token',
            'api-key'
        )
    )
    ->apiHeaderCredentials(
        ApiHeaderCredentialsBuilder::init(
            'token',
            'api-key'
        )
    )
    ->oAuthCCGCredentials(
        OAuthCCGCredentialsBuilder::init(
            'OAuthClientId',
            'OAuthClientSecret'
        )
    )
    ->oAuthACGCredentials(
        OAuthACGCredentialsBuilder::init(
            'OAuthClientId',
            'OAuthClientSecret',
            'OAuthRedirectUri'
        )
            ->oAuthScopes(
                [
                    OAuthScopeOAuthACGEnum::READ_SCOPE
                ]
            )
    )
    ->oAuthROPCGCredentials(
        OAuthROPCGCredentialsBuilder::init(
            'OAuthClientId',
            'OAuthClientSecret',
            'OAuthUsername',
            'OAuthPassword'
        )
    )
    ->oAuthBearerTokenCredentials(
        OAuthBearerTokenCredentialsBuilder::init(
            'AccessToken'
        )
    )
    ->accessToken2('accessToken')
    ->environment('testing')
    ->port('80')
    ->suites(SuiteCodeEnum::HEARTS)
    ->build();
```

## Environments

The SDK can be configured to use a different environment for making API calls. Available environments are:

### Fields

| Name | Description |
|  --- | --- |
| production | - |
| testing | **Default** |

## Authorization

This API uses the following authentication schemes.

* [`basicAuth (Basic Authentication)`](https://www.github.com/Syed-Subtain/multi-auth-project-php-sdk/tree/1.0.0/doc/$a/https://www.github.com/Syed-Subtain/multi-auth-project-php-sdk/tree/1.0.0/basic-authentication.md)
* [`apiKey (Custom Query Parameter)`](https://www.github.com/Syed-Subtain/multi-auth-project-php-sdk/tree/1.0.0/doc/$a/https://www.github.com/Syed-Subtain/multi-auth-project-php-sdk/tree/1.0.0/custom-query-parameter.md)
* [`apiHeader (Custom Header Signature)`](https://www.github.com/Syed-Subtain/multi-auth-project-php-sdk/tree/1.0.0/doc/$a/https://www.github.com/Syed-Subtain/multi-auth-project-php-sdk/tree/1.0.0/custom-header-signature.md)
* [`OAuthCCG (OAuth 2 Client Credentials Grant)`](https://www.github.com/Syed-Subtain/multi-auth-project-php-sdk/tree/1.0.0/doc/$a/https://www.github.com/Syed-Subtain/multi-auth-project-php-sdk/tree/1.0.0/oauth-2-client-credentials-grant.md)
* [`OAuthACG (OAuth 2 Authorization Code Grant)`](https://www.github.com/Syed-Subtain/multi-auth-project-php-sdk/tree/1.0.0/doc/$a/https://www.github.com/Syed-Subtain/multi-auth-project-php-sdk/tree/1.0.0/oauth-2-authorization-code-grant.md)
* [`OAuthROPCG (OAuth 2 Resource Owner Credentials Grant)`](https://www.github.com/Syed-Subtain/multi-auth-project-php-sdk/tree/1.0.0/doc/$a/https://www.github.com/Syed-Subtain/multi-auth-project-php-sdk/tree/1.0.0/oauth-2-resource-owner-credentials-grant.md)
* [`OAuthBearerToken (OAuth 2 Bearer token)`](https://www.github.com/Syed-Subtain/multi-auth-project-php-sdk/tree/1.0.0/doc/$a/https://www.github.com/Syed-Subtain/multi-auth-project-php-sdk/tree/1.0.0/oauth-2-bearer-token.md)
* `CustomAuth (Custom Authentication)`

## List of APIs

* [O Auth Authorization](https://www.github.com/Syed-Subtain/multi-auth-project-php-sdk/tree/1.0.0/doc/controllers/o-auth-authorization.md)
* [Authentication](https://www.github.com/Syed-Subtain/multi-auth-project-php-sdk/tree/1.0.0/doc/controllers/authentication.md)

## Classes Documentation

* [ApiException](https://www.github.com/Syed-Subtain/multi-auth-project-php-sdk/tree/1.0.0/doc/api-exception.md)
* [HttpRequest](https://www.github.com/Syed-Subtain/multi-auth-project-php-sdk/tree/1.0.0/doc/http-request.md)
* [HttpResponse](https://www.github.com/Syed-Subtain/multi-auth-project-php-sdk/tree/1.0.0/doc/http-response.md)

