<?php

declare(strict_types=1);

/*
 * MultiAuthSampleLib
 *
 * This file was automatically generated by APIMATIC v3.0 ( https://www.apimatic.io ).
 */

namespace MultiAuthSampleLib;

use CoreInterfaces\Http\HttpConfigurations;
use MultiAuthSampleLib\Authentication\ApiHeaderCredentials;
use MultiAuthSampleLib\Authentication\ApiHeaderCredentialsBuilder;
use MultiAuthSampleLib\Authentication\ApiKeyCredentials;
use MultiAuthSampleLib\Authentication\ApiKeyCredentialsBuilder;
use MultiAuthSampleLib\Authentication\BasicAuthCredentials;
use MultiAuthSampleLib\Authentication\BasicAuthCredentialsBuilder;
use MultiAuthSampleLib\Authentication\OAuthACGCredentials;
use MultiAuthSampleLib\Authentication\OAuthACGCredentialsBuilder;
use MultiAuthSampleLib\Authentication\OAuthBearerTokenCredentials;
use MultiAuthSampleLib\Authentication\OAuthBearerTokenCredentialsBuilder;
use MultiAuthSampleLib\Authentication\OAuthCCGCredentials;
use MultiAuthSampleLib\Authentication\OAuthCCGCredentialsBuilder;
use MultiAuthSampleLib\Authentication\OAuthROPCGCredentials;
use MultiAuthSampleLib\Authentication\OAuthROPCGCredentialsBuilder;

/**
 * An interface for all configuration parameters required by the SDK.
 */
interface ConfigurationInterface extends HttpConfigurations
{
    /**
     * Get access Token 2
     */
    public function getAccessToken2(): string;

    /**
     * Get current API environment
     */
    public function getEnvironment(): string;

    /**
     * Get port
     */
    public function getPort(): string;

    /**
     * Get suites
     */
    public function getSuites(): int;

    /**
     * Get the credentials to use with BasicAuth
     */
    public function getBasicAuthCredentials(): BasicAuthCredentials;

    /**
     * Get the credentials builder instance to update credentials for BasicAuth
     */
    public function getBasicAuthCredentialsBuilder(): ?BasicAuthCredentialsBuilder;

    /**
     * Get the credentials to use with ApiKey
     */
    public function getApiKeyCredentials(): ApiKeyCredentials;

    /**
     * Get the credentials builder instance to update credentials for ApiKey
     */
    public function getApiKeyCredentialsBuilder(): ?ApiKeyCredentialsBuilder;

    /**
     * Get the credentials to use with ApiHeader
     */
    public function getApiHeaderCredentials(): ApiHeaderCredentials;

    /**
     * Get the credentials builder instance to update credentials for ApiHeader
     */
    public function getApiHeaderCredentialsBuilder(): ?ApiHeaderCredentialsBuilder;

    /**
     * Get the credentials to use with OAuthCCG
     */
    public function getOAuthCCGCredentials(): OAuthCCGCredentials;

    /**
     * Get the credentials builder instance to update credentials for OAuthCCG
     */
    public function getOAuthCCGCredentialsBuilder(): ?OAuthCCGCredentialsBuilder;

    /**
     * Get the credentials to use with OAuthACG
     */
    public function getOAuthACGCredentials(): OAuthACGCredentials;

    /**
     * Get the credentials builder instance to update credentials for OAuthACG
     */
    public function getOAuthACGCredentialsBuilder(): ?OAuthACGCredentialsBuilder;

    /**
     * Get the credentials to use with OAuthROPCG
     */
    public function getOAuthROPCGCredentials(): OAuthROPCGCredentials;

    /**
     * Get the credentials builder instance to update credentials for OAuthROPCG
     */
    public function getOAuthROPCGCredentialsBuilder(): ?OAuthROPCGCredentialsBuilder;

    /**
     * Get the credentials to use with OAuthBearerToken
     */
    public function getOAuthBearerTokenCredentials(): OAuthBearerTokenCredentials;

    /**
     * Get the credentials builder instance to update credentials for OAuthBearerToken
     */
    public function getOAuthBearerTokenCredentialsBuilder(): ?OAuthBearerTokenCredentialsBuilder;

    /**
     * Get the base uri for a given server in the current environment.
     *
     * @param string $server Server name
     *
     * @return string Base URI
     */
    public function getBaseUri(string $server = Server::DEFAULT_): string;
}
