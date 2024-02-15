<?php

declare(strict_types=1);

/*
 * MultiAuthSampleLib
 *
 * This file was automatically generated by APIMATIC v3.0 ( https://www.apimatic.io ).
 */

namespace MultiAuthSampleLib\Authentication;

use CoreInterfaces\Core\Request\RequestMethod;
use CoreInterfaces\Core\Request\TypeValidatorInterface;
use Core\Authentication\CoreAuth;
use Core\Client;
use Core\Request\Parameters\HeaderParam;
use Core\Request\Parameters\AdditionalQueryParams;
use Core\Request\RequestBuilder;
use InvalidArgumentException;
use MultiAuthSampleLib\Models\OAuthToken;
use MultiAuthSampleLib\Controllers\OAuthAuthorizationController;

/**
 * Utility class for OAuth 2 authorization and token management
 */
class OAuthACGManager extends CoreAuth implements OAuthACGCredentials
{
    private $client;

    /**
     * Singleton instance of OAuth 2 API controller
     * @var OAuthAuthorizationController
     */
    private $oAuthApi;

    private $oAuthClientId;

    private $oAuthClientSecret;

    private $oAuthRedirectUri;

    private $oAuthToken;

    private $oAuthScopes;

    /**
     * Returns an instance of this class.
     *
     * @param string $oAuthClientId OAuth 2 Client ID
     * @param string $oAuthClientSecret OAuth 2 Client Secret
     * @param string $oAuthRedirectUri OAuth 2 Redirection endpoint or Callback Uri
     * @param mixed $oAuthToken Object for storing information about the OAuth token
     * @param mixed $oAuthScopes List of scopes that apply to the OAuth token
     */
    public function __construct(
        string $oAuthClientId,
        string $oAuthClientSecret,
        string $oAuthRedirectUri,
        $oAuthToken,
        $oAuthScopes
    ) {
        $this->oAuthClientId = $oAuthClientId;
        $this->oAuthClientSecret = $oAuthClientSecret;
        $this->oAuthRedirectUri = $oAuthRedirectUri;
        if ($oAuthToken instanceof OAuthToken) {
            $this->oAuthToken = $oAuthToken;
            parent::__construct(
                HeaderParam::init('Authorization', 'Bearer ' . $oAuthToken->getAccessToken())->required()
            );
        }
        if (is_array($oAuthScopes)) {
            $this->oAuthScopes = $oAuthScopes;
        }
    }

    public function setClient(Client $client): void
    {
        $this->client = $client;
        $this->oAuthApi = new OAuthAuthorizationController($client);
    }

    /**
     * String value for oAuthClientId.
     */
    public function getOAuthClientId(): string
    {
        return $this->oAuthClientId;
    }

    /**
     * String value for oAuthClientSecret.
     */
    public function getOAuthClientSecret(): string
    {
        return $this->oAuthClientSecret;
    }

    /**
     * String value for oAuthRedirectUri.
     */
    public function getOAuthRedirectUri(): string
    {
        return $this->oAuthRedirectUri;
    }

    /**
     * OAuthToken value for oAuthToken.
     */
    public function getOAuthToken(): ?OAuthToken
    {
        return $this->oAuthToken;
    }

    /**
     * OAuthScopeOAuthACGEnum value for oAuthScopes.
     */
    public function getOAuthScopes(): ?array
    {
        return $this->oAuthScopes;
    }

    /**
     * Checks if provided credentials match with existing ones.
     *
     * @param string $oAuthClientId OAuth 2 Client ID
     * @param string $oAuthClientSecret OAuth 2 Client Secret
     * @param string $oAuthRedirectUri OAuth 2 Redirection endpoint or Callback Uri
     */
    public function equals(string $oAuthClientId, string $oAuthClientSecret, string $oAuthRedirectUri): bool
    {
        return $oAuthClientId == $this->oAuthClientId &&
            $oAuthClientSecret == $this->oAuthClientSecret &&
            $oAuthRedirectUri == $this->oAuthRedirectUri;
    }

    /**
     * Build an authorization URL for taking the user's consent to access data.
     * @param  string|null       $state            An opaque state string
     * @param  array|null        $additionalParams Additional parameters to add the the authorization URL
     */
    public function buildAuthorizationUrl(?string $state = null, ?array $additionalParams = null): string
    {
        return (new RequestBuilder(RequestMethod::GET, ""))
            ->parameters(
                AdditionalQueryParams::init($additionalParams),
                AdditionalQueryParams::init([
                    'response_type' => 'code',
                    'client_id'     => $this->oAuthClientId,
                    'redirect_uri'  => $this->oAuthRedirectUri,
                    'scope'         => implode(' ', $this->oAuthScopes ?? []),
                    'state'         => $state
                ])
            )
            ->build($this->client)
            ->getQueryUrl();
    }

    /**
     * Fetch the OAuth token.
     * @param  string     $authorizationCode Authorization code returned by the OAuth provider.
     * @param  array|null $additionalParams  Additional parameters to send during authorization
     */
    public function fetchToken(string $authorizationCode, ?array $additionalParams = null): OAuthToken
    {
        //send request for access token
        $oAuthToken = $this->oAuthApi->requestTokenOAuthACG(
            $this->buildBasicHeader(),
            $authorizationCode,
            $this->oAuthRedirectUri ?? "",
            $additionalParams
        );

        //add expiry
        if ($oAuthToken->getExpiresIn() != null && $oAuthToken->getExpiresIn() != 0) {
            $oAuthToken->setExpiry(time() + $oAuthToken->getExpiresIn());
        }

        return $oAuthToken;
    }

    /**
     * Refresh the OAuth token.
     * @param  array|null        $additionalParams Additional parameters to send during token refresh
     */
    public function refreshToken(?array $additionalParams = null): OAuthToken
    {
        //send request for token refresh
        $oAuthToken = $this->oAuthApi->refreshTokenOAuthACG(
            $this->buildBasicHeader(),
            $this->oAuthToken->getRefreshToken() ?? "",
            implode(' ', $this->oAuthScopes ?? []),
            $additionalParams
        );

        //add expiry
        if ($oAuthToken->getExpiresIn() != null && $oAuthToken->getExpiresIn() != 0) {
            $oAuthToken->setExpiry(time() + $oAuthToken->getExpiresIn());
        }

        return $oAuthToken;
    }

    /**
     * Has the OAuth token expired?
     */
    public function isTokenExpired(): bool
    {
        return $this->oAuthToken->getExpiry() != null &&
            $this->oAuthToken->getExpiry() < time();
    }

    /**
     * Check if client is authorized, throws exceptions when token is null or expired.
     *
     * @throws InvalidArgumentException
     */
    public function validate(TypeValidatorInterface $validator): void
    {
        if ($this->oAuthToken == null) {
            throw new InvalidArgumentException('Client is not authorized. An OAuth token is needed to make API calls.');
        }

        if ($this->isTokenExpired()) {
            throw new InvalidArgumentException('OAuth token is expired. A valid token is needed to make API calls.');
        }
        parent::validate($validator);
    }

    /**
     * Build authorization header value for basic auth
     */
    private function buildBasicHeader(): string
    {
        return 'Basic ' . base64_encode(
            $this->oAuthClientId . ':' . $this->oAuthClientSecret
        );
    }
}
