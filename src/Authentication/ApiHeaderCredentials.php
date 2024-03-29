<?php

declare(strict_types=1);

/*
 * MultiAuthSampleLib
 *
 * This file was automatically generated by APIMATIC v3.0 ( https://www.apimatic.io ).
 */

namespace MultiAuthSampleLib\Authentication;

/**
 * Interface for defining the behavior of Authentication.
 */
interface ApiHeaderCredentials
{
    /**
     * String value for token.
     */
    public function getToken(): string;

    /**
     * String value for apiKey.
     */
    public function getApiKey(): string;

    /**
     * Checks if provided credentials match with existing ones.
     *
     * @param string $token
     * @param string $apiKey
     */
    public function equals(string $token, string $apiKey): bool;
}
