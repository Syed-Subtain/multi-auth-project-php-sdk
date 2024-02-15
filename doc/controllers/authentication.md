# Authentication

```php
$authenticationController = $client->getAuthenticationController();
```

## Class Name

`AuthenticationController`

## Methods

* [O Auth Bearer Token](../../doc/controllers/authentication.md#o-auth-bearer-token)
* [Custom Authentication](../../doc/controllers/authentication.md#custom-authentication)
* [Custom Query or Header Authentication](../../doc/controllers/authentication.md#custom-query-or-header-authentication)
* [O Auth Grant Types or Combinations](../../doc/controllers/authentication.md#o-auth-grant-types-or-combinations)
* [No Auth](../../doc/controllers/authentication.md#no-auth)
* [O Auth Client Credentials Grant](../../doc/controllers/authentication.md#o-auth-client-credentials-grant)
* [Basic Auth and Api Header Auth](../../doc/controllers/authentication.md#basic-auth-and-api-header-auth)
* [O Auth Authorization Grant](../../doc/controllers/authentication.md#o-auth-authorization-grant)
* [Multiple Auth Combination](../../doc/controllers/authentication.md#multiple-auth-combination)


# O Auth Bearer Token

```php
function oAuthBearerToken(): string
```

## Response Type

`string`

## Example Usage

```php
$result = $authenticationController->oAuthBearerToken();
```


# Custom Authentication

```php
function customAuthentication(): string
```

## Response Type

`string`

## Example Usage

```php
$result = $authenticationController->customAuthentication();
```


# Custom Query or Header Authentication

```php
function customQueryOrHeaderAuthentication(): string
```

## Response Type

`string`

## Example Usage

```php
$result = $authenticationController->customQueryOrHeaderAuthentication();
```


# O Auth Grant Types or Combinations

This endpoint tests or combinations of OAuth types

```php
function oAuthGrantTypesORCombinations(): string
```

## Response Type

`string`

## Example Usage

```php
$result = $authenticationController->oAuthGrantTypesORCombinations();
```


# No Auth

**This endpoint is deprecated since version 0.0.1-alpha. You should not use this method as it requires no auth and can bring security issues to the server and api call itself!!**

This endpoint does not use auth.

Swagger URL Endpoint 1: [http://swagger.io/endpoint1](http://swagger.io/endpoint1)

:information_source: **Note** This endpoint does not require authentication.

```php
function noAuth(): string
```

## Response Type

`string`

## Example Usage

```php
$result = $authenticationController->noAuth();
```


# O Auth Client Credentials Grant

```php
function oAuthClientCredentialsGrant(): ServiceStatus
```

## Response Type

[`ServiceStatus`](../../doc/models/service-status.md)

## Example Usage

```php
$result = $authenticationController->oAuthClientCredentialsGrant();
```


# Basic Auth and Api Header Auth

```php
function basicAuthAndApiHeaderAuth(): string
```

## Response Type

`string`

## Example Usage

```php
$result = $authenticationController->basicAuthAndApiHeaderAuth();
```


# O Auth Authorization Grant

```php
function oAuthAuthorizationGrant(): User
```

## Response Type

[`User`](../../doc/models/user.md)

## Example Usage

```php
$result = $authenticationController->oAuthAuthorizationGrant();
```


# Multiple Auth Combination

**This endpoint is deprecated.**

This endpoint uses globally applied auth which is a hypothetical scneraio but covers the worst case.

Swagger URL Endpoint 1: [http://swagger.io/endpoint1](http://swagger.io/endpoint1)

```php
function multipleAuthCombination(): string
```

## Response Type

`string`

## Example Usage

```php
$result = $authenticationController->multipleAuthCombination();
```

