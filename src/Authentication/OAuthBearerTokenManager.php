<?php

declare(strict_types=1);

/*
 * MultiAuthSampleLib
 *
 * This file was automatically generated by APIMATIC v3.0 ( https://www.apimatic.io ).
 */

namespace MultiAuthSampleLib\Authentication;

use Core\Authentication\CoreAuth;
use Core\Request\Parameters\HeaderParam;

/**
 * Utility class for authorization and token management.
 */
class OAuthBearerTokenManager extends CoreAuth implements OAuthBearerTokenCredentials
{
    private $accessToken;

    /**
     * Returns an instance of this class.
     *
     * @param string $accessToken The OAuth 2.0 Access Token to use for API requests.
     */
    public function __construct(string $accessToken)
    {
        parent::__construct(HeaderParam::init('Authorization', 'Bearer ' . $accessToken)->required());
        $this->accessToken = $accessToken;
    }

    /**
     * String value for accessToken.
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    /**
     * Checks if provided credentials match with existing ones.
     *
     * @param string $accessToken The OAuth 2.0 Access Token to use for API requests.
     */
    public function equals(string $accessToken): bool
    {
        return $accessToken == $this->accessToken;
    }
}
