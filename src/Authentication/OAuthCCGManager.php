<?php

declare(strict_types=1);

/*
 * MultiAuthSampleLib
 *
 * This file was automatically generated by APIMATIC v3.0 ( https://www.apimatic.io ).
 */

namespace MultiAuthSampleLib\Authentication;

use CoreInterfaces\Core\Request\TypeValidatorInterface;
use Core\Authentication\CoreAuth;
use Core\Client;
use Core\Request\Parameters\HeaderParam;
use InvalidArgumentException;
use MultiAuthSampleLib\Models\OAuthToken;
use MultiAuthSampleLib\Controllers\OAuthAuthorizationController;

/**
 * Utility class for OAuth 2 authorization and token management
 */
class OAuthCCGManager extends CoreAuth implements OAuthCCGCredentials
{
    /**
     * Singleton instance of OAuth 2 API controller
     * @var OAuthAuthorizationController
     */
    private $oAuthApi;

    private $oAuthClientId;

    private $oAuthClientSecret;

    private $oAuthToken;

    /**
     * Returns an instance of this class.
     *
     * @param string $oAuthClientId OAuth 2 Client ID
     * @param string $oAuthClientSecret OAuth 2 Client Secret
     * @param mixed $oAuthToken Object for storing information about the OAuth token
     */
    public function __construct(string $oAuthClientId, string $oAuthClientSecret, $oAuthToken)
    {
        $this->oAuthClientId = $oAuthClientId;
        $this->oAuthClientSecret = $oAuthClientSecret;
        if ($oAuthToken instanceof OAuthToken) {
            $this->oAuthToken = $oAuthToken;
            parent::__construct(
                HeaderParam::init('Authorization', 'Bearer ' . $oAuthToken->getAccessToken())->required()
            );
        }
    }

    public function setClient(Client $client): void
    {
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
     * OAuthToken value for oAuthToken.
     */
    public function getOAuthToken(): ?OAuthToken
    {
        return $this->oAuthToken;
    }

    /**
     * Checks if provided credentials match with existing ones.
     *
     * @param string $oAuthClientId OAuth 2 Client ID
     * @param string $oAuthClientSecret OAuth 2 Client Secret
     */
    public function equals(string $oAuthClientId, string $oAuthClientSecret): bool
    {
        return $oAuthClientId == $this->oAuthClientId &&
            $oAuthClientSecret == $this->oAuthClientSecret;
    }

    /**
     * Fetch the OAuth token.
     * @param  array|null        $additionalParams  Additional parameters to send during authorization
     */
    public function fetchToken(?array $additionalParams = null): OAuthToken
    {
        //send request for access token
        $oAuthToken = $this->oAuthApi->requestTokenOAuthCCG(
            $this->buildBasicHeader(),
            null,
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
