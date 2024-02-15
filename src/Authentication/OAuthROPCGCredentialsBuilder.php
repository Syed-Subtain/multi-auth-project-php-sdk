<?php

declare(strict_types=1);

/*
 * MultiAuthSampleLib
 *
 * This file was automatically generated by APIMATIC v3.0 ( https://www.apimatic.io ).
 */

namespace MultiAuthSampleLib\Authentication;

use Core\Utils\CoreHelper;
use MultiAuthSampleLib\Models\OAuthToken;

/**
 * Utility class for initializing OAuthROPCG security credentials.
 */
class OAuthROPCGCredentialsBuilder
{
    /**
     * @var array
     */
    private $config;

    private function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * Initializer for OAuthROPCGCredentialsBuilder
     *
     * @param string $oAuthClientId
     * @param string $oAuthClientSecret
     * @param string $oAuthUsername
     * @param string $oAuthPassword
     */
    public static function init(
        string $oAuthClientId,
        string $oAuthClientSecret,
        string $oAuthUsername,
        string $oAuthPassword
    ): self {
        return new self([
            'oAuthClientId3' => $oAuthClientId,
            'oAuthClientSecret3' => $oAuthClientSecret,
            'oAuthUsername3' => $oAuthUsername,
            'oAuthPassword3' => $oAuthPassword
        ]);
    }

    /**
     * Setter for OAuthClientId.
     *
     * @param string $oAuthClientId
     *
     * @return $this
     */
    public function oAuthClientId(string $oAuthClientId): self
    {
        $this->config['oAuthClientId3'] = $oAuthClientId;
        return $this;
    }

    /**
     * Setter for OAuthClientSecret.
     *
     * @param string $oAuthClientSecret
     *
     * @return $this
     */
    public function oAuthClientSecret(string $oAuthClientSecret): self
    {
        $this->config['oAuthClientSecret3'] = $oAuthClientSecret;
        return $this;
    }

    /**
     * Setter for OAuthUsername.
     *
     * @param string $oAuthUsername
     *
     * @return $this
     */
    public function oAuthUsername(string $oAuthUsername): self
    {
        $this->config['oAuthUsername3'] = $oAuthUsername;
        return $this;
    }

    /**
     * Setter for OAuthPassword.
     *
     * @param string $oAuthPassword
     *
     * @return $this
     */
    public function oAuthPassword(string $oAuthPassword): self
    {
        $this->config['oAuthPassword3'] = $oAuthPassword;
        return $this;
    }

    /**
     * Setter for OAuthToken.
     *
     * @param OAuthToken|null $oAuthToken
     *
     * @return $this
     */
    public function oAuthToken(?OAuthToken $oAuthToken): self
    {
        $this->config['oAuthToken3'] = $oAuthToken;
        return $this;
    }

    public function getConfiguration(): array
    {
        return CoreHelper::clone($this->config);
    }
}