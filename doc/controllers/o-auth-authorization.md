# O Auth Authorization

```php
$oAuthAuthorizationController = $client->getOAuthAuthorizationController();
```

## Class Name

`OAuthAuthorizationController`

## Methods

* [Request Token O Auth CCG](../../doc/controllers/o-auth-authorization.md#request-token-o-auth-ccg)
* [Request Token O Auth ACG](../../doc/controllers/o-auth-authorization.md#request-token-o-auth-acg)
* [Refresh Token O Auth ACG](../../doc/controllers/o-auth-authorization.md#refresh-token-o-auth-acg)
* [Request Token O Auth ROPCG](../../doc/controllers/o-auth-authorization.md#request-token-o-auth-ropcg)
* [Refresh Token O Auth ROPCG](../../doc/controllers/o-auth-authorization.md#refresh-token-o-auth-ropcg)


# Request Token O Auth CCG

Create a new OAuth 2 token.

:information_source: **Note** This endpoint does not require authentication.

```php
function requestTokenOAuthCCG(
    string $authorization,
    ?string $scope = null,
    array $fieldParameters = null
): OAuthToken
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `authorization` | `string` | Header, Required | Authorization header in Basic auth format |
| `scope` | `?string` | Form, Optional | Requested scopes as a space-delimited list. |
| `fieldParameters` | `?array` | Optional | Pass additional field parameters. |

## Response Type

[`OAuthToken`](../../doc/models/o-auth-token.md)

## Example Usage

```php
$authorization = 'Authorization8';

$additionalFieldParams = [
    'key0' => ApiHelper::deserialize('"additionalFieldParams9"')
];

$result = $oAuthAuthorizationController->requestTokenOAuthCCG(
    $authorization,
    null,
    $additionalFieldParams
);
```

## Errors

| HTTP Status Code | Error Description | Exception Class |
|  --- | --- | --- |
| 400 | OAuth 2 provider returned an error. | [`OAuthProviderException`](../../doc/models/o-auth-provider-exception.md) |
| 401 | OAuth 2 provider says client authentication failed. | [`OAuthProviderException`](../../doc/models/o-auth-provider-exception.md) |


# Request Token O Auth ACG

Create a new OAuth 2 token.

:information_source: **Note** This endpoint does not require authentication.

```php
function requestTokenOAuthACG(
    string $authorization,
    string $code,
    string $redirectUri,
    array $fieldParameters = null
): OAuthToken
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `authorization` | `string` | Header, Required | Authorization header in Basic auth format |
| `code` | `string` | Form, Required | Authorization Code |
| `redirectUri` | `string` | Form, Required | Redirect Uri |
| `fieldParameters` | `?array` | Optional | Pass additional field parameters. |

## Response Type

[`OAuthToken`](../../doc/models/o-auth-token.md)

## Example Usage

```php
$authorization = 'Authorization8';

$code = 'code8';

$redirectUri = 'redirect_uri8';

$additionalFieldParams = [
    'key0' => ApiHelper::deserialize('"additionalFieldParams9"')
];

$result = $oAuthAuthorizationController->requestTokenOAuthACG(
    $authorization,
    $code,
    $redirectUri,
    $additionalFieldParams
);
```

## Errors

| HTTP Status Code | Error Description | Exception Class |
|  --- | --- | --- |
| 400 | OAuth 2 provider returned an error. | [`OAuthProviderException`](../../doc/models/o-auth-provider-exception.md) |
| 401 | OAuth 2 provider says client authentication failed. | [`OAuthProviderException`](../../doc/models/o-auth-provider-exception.md) |


# Refresh Token O Auth ACG

Obtain a new access token using a refresh token

:information_source: **Note** This endpoint does not require authentication.

```php
function refreshTokenOAuthACG(
    string $authorization,
    string $refreshToken,
    ?string $scope = null,
    array $fieldParameters = null
): OAuthToken
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `authorization` | `string` | Header, Required | Authorization header in Basic auth format |
| `refreshToken` | `string` | Form, Required | Refresh token |
| `scope` | `?string` | Form, Optional | Requested scopes as a space-delimited list. |
| `fieldParameters` | `?array` | Optional | Pass additional field parameters. |

## Response Type

[`OAuthToken`](../../doc/models/o-auth-token.md)

## Example Usage

```php
$authorization = 'Authorization8';

$refreshToken = 'refresh_token0';

$additionalFieldParams = [
    'key0' => ApiHelper::deserialize('"additionalFieldParams9"')
];

$result = $oAuthAuthorizationController->refreshTokenOAuthACG(
    $authorization,
    $refreshToken,
    null,
    $additionalFieldParams
);
```

## Errors

| HTTP Status Code | Error Description | Exception Class |
|  --- | --- | --- |
| 400 | OAuth 2 provider returned an error. | [`OAuthProviderException`](../../doc/models/o-auth-provider-exception.md) |
| 401 | OAuth 2 provider says client authentication failed. | [`OAuthProviderException`](../../doc/models/o-auth-provider-exception.md) |


# Request Token O Auth ROPCG

Create a new OAuth 2 token.

:information_source: **Note** This endpoint does not require authentication.

```php
function requestTokenOAuthROPCG(
    string $authorization,
    string $username,
    string $password,
    ?string $scope = null,
    array $fieldParameters = null
): OAuthToken
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `authorization` | `string` | Header, Required | Authorization header in Basic auth format |
| `username` | `string` | Form, Required | Resource owner username |
| `password` | `string` | Form, Required | Resource owner password |
| `scope` | `?string` | Form, Optional | Requested scopes as a space-delimited list. |
| `fieldParameters` | `?array` | Optional | Pass additional field parameters. |

## Response Type

[`OAuthToken`](../../doc/models/o-auth-token.md)

## Example Usage

```php
$authorization = 'Authorization8';

$username = 'username0';

$password = 'password4';

$additionalFieldParams = [
    'key0' => ApiHelper::deserialize('"additionalFieldParams9"')
];

$result = $oAuthAuthorizationController->requestTokenOAuthROPCG(
    $authorization,
    $username,
    $password,
    null,
    $additionalFieldParams
);
```

## Errors

| HTTP Status Code | Error Description | Exception Class |
|  --- | --- | --- |
| 400 | OAuth 2 provider returned an error. | [`OAuthProviderException`](../../doc/models/o-auth-provider-exception.md) |
| 401 | OAuth 2 provider says client authentication failed. | [`OAuthProviderException`](../../doc/models/o-auth-provider-exception.md) |


# Refresh Token O Auth ROPCG

Obtain a new access token using a refresh token

:information_source: **Note** This endpoint does not require authentication.

```php
function refreshTokenOAuthROPCG(
    string $authorization,
    string $refreshToken,
    ?string $scope = null,
    array $fieldParameters = null
): OAuthToken
```

## Parameters

| Parameter | Type | Tags | Description |
|  --- | --- | --- | --- |
| `authorization` | `string` | Header, Required | Authorization header in Basic auth format |
| `refreshToken` | `string` | Form, Required | Refresh token |
| `scope` | `?string` | Form, Optional | Requested scopes as a space-delimited list. |
| `fieldParameters` | `?array` | Optional | Pass additional field parameters. |

## Response Type

[`OAuthToken`](../../doc/models/o-auth-token.md)

## Example Usage

```php
$authorization = 'Authorization8';

$refreshToken = 'refresh_token0';

$additionalFieldParams = [
    'key0' => ApiHelper::deserialize('"additionalFieldParams9"')
];

$result = $oAuthAuthorizationController->refreshTokenOAuthROPCG(
    $authorization,
    $refreshToken,
    null,
    $additionalFieldParams
);
```

## Errors

| HTTP Status Code | Error Description | Exception Class |
|  --- | --- | --- |
| 400 | OAuth 2 provider returned an error. | [`OAuthProviderException`](../../doc/models/o-auth-provider-exception.md) |
| 401 | OAuth 2 provider says client authentication failed. | [`OAuthProviderException`](../../doc/models/o-auth-provider-exception.md) |

