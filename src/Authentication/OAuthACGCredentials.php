<?php

declare(strict_types=1);

/*
 * MultiAuthSampleLib
 *
 * This file was automatically generated by APIMATIC v3.0 ( https://www.apimatic.io ).
 */

namespace MultiAuthSampleLib\Authentication;

use MultiAuthSampleLib\Models\OAuthToken;

/**
 * Interface for defining the behavior of Authentication.
 */
interface OAuthACGCredentials
{
    /**
     * String value for oAuthClientId.
     */
    public function getOAuthClientId(): string;

    /**
     * String value for oAuthClientSecret.
     */
    public function getOAuthClientSecret(): string;

    /**
     * String value for oAuthRedirectUri.
     */
    public function getOAuthRedirectUri(): string;

    /**
     * OAuthToken value for oAuthToken.
     */
    public function getOAuthToken(): ?OAuthToken;

    /**
     * OAuthScopeOAuthACGEnum value for oAuthScopes.
     */
    public function getOAuthScopes(): ?array;

    /**
     * Checks if provided credentials match with existing ones.
     *
     * @param string $oAuthClientId OAuth 2 Client ID
     * @param string $oAuthClientSecret OAuth 2 Client Secret
     * @param string $oAuthRedirectUri OAuth 2 Redirection endpoint or Callback Uri
     */
    public function equals(string $oAuthClientId, string $oAuthClientSecret, string $oAuthRedirectUri): bool;

    /**
     * Build an authorization URL for taking the user's consent to access data.
     *
     * @param string|null $state An opaque state string.
     * @param array|null $additionalParams Additional parameters to be sent.
     */
    public function buildAuthorizationUrl(?string $state = null, ?array $additionalParams = null): string;

    /**
     * Refresh the OAuth token.
     *
     * @param array|null $additionalParams Additional parameters to be sent.
     */
    public function refreshToken(?array $additionalParams = null): OAuthToken;

    /**
     * Fetch the OAuth token.
     *
     * @param string $authorizationCode Authorization code returned by the OAuth provider.
     * @param array|null $additionalParams Additional parameters to be sent.
     */
    public function fetchToken(string $authorizationCode, ?array $additionalParams = null): OAuthToken;

    /**
     * Has the OAuth token expired?
     */
    public function isTokenExpired(): bool;
}
