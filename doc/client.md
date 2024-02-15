
# Client Class Documentation

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
| `basicAuthCredentials` | [`BasicAuthCredentials`]($a/basic-authentication.md) | The Credentials Setter for Basic Authentication |
| `apiKeyCredentials` | [`ApiKeyCredentials`]($a/custom-query-parameter.md) | The Credentials Setter for Custom Query Parameter |
| `apiHeaderCredentials` | [`ApiHeaderCredentials`]($a/custom-header-signature.md) | The Credentials Setter for Custom Header Signature |
| `oAuthCCGCredentials` | [`OAuthCCGCredentials`]($a/oauth-2-client-credentials-grant.md) | The Credentials Setter for OAuth 2 Client Credentials Grant |
| `oAuthACGCredentials` | [`OAuthACGCredentials`]($a/oauth-2-authorization-code-grant.md) | The Credentials Setter for OAuth 2 Authorization Code Grant |
| `oAuthROPCGCredentials` | [`OAuthROPCGCredentials`]($a/oauth-2-resource-owner-credentials-grant.md) | The Credentials Setter for OAuth 2 Resource Owner Credentials Grant |
| `oAuthBearerTokenCredentials` | [`OAuthBearerTokenCredentials`]($a/oauth-2-bearer-token.md) | The Credentials Setter for OAuth 2 Bearer token |

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

## MultiAuth-Sample Client

The gateway for the SDK. This class acts as a factory for the Controllers and also holds the configuration of the SDK.

## Controllers

| Name | Description |
|  --- | --- |
| getAuthenticationController() | Gets AuthenticationController |
| getOAuthAuthorizationController() | Gets OAuthAuthorizationController |

