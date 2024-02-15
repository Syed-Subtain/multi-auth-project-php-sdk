<?php

declare(strict_types=1);

/*
 * MultiAuthSampleLib
 *
 * This file was automatically generated by APIMATIC v3.0 ( https://www.apimatic.io ).
 */

namespace MultiAuthSampleLib\Controllers;

use Core\Request\Parameters\AdditionalFormParams;
use Core\Request\Parameters\FormParam;
use Core\Request\Parameters\HeaderParam;
use Core\Response\Types\ErrorType;
use CoreInterfaces\Core\Request\RequestMethod;
use MultiAuthSampleLib\Exceptions\ApiException;
use MultiAuthSampleLib\Exceptions\OAuthProviderException;
use MultiAuthSampleLib\Models\OAuthToken;
use MultiAuthSampleLib\Server;

class OAuthAuthorizationController extends BaseController
{
    /**
     * Create a new OAuth 2 token.
     *
     * @param string $authorization Authorization header in Basic auth format
     * @param string|null $scope Requested scopes as a space-delimited list.
     * @param array|null $fieldParameters Additional optional form parameters are supported by this
     *        endpoint
     *
     * @return OAuthToken Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function requestTokenOAuthCCG(
        string $authorization,
        ?string $scope = null,
        array $fieldParameters = null
    ): OAuthToken {
        $_reqBuilder = $this->requestBuilder(RequestMethod::POST, '/request_token')
            ->server(Server::AUTH)
            ->parameters(
                FormParam::init('grant_type', 'client_credentials'),
                HeaderParam::init('Authorization', $authorization),
                FormParam::init('scope', $scope),
                AdditionalFormParams::init($fieldParameters)
            );

        $_resHandler = $this->responseHandler()
            ->throwErrorOn(
                '400',
                ErrorType::init('OAuth 2 provider returned an error.', OAuthProviderException::class)
            )
            ->throwErrorOn(
                '401',
                ErrorType::init(
                    'OAuth 2 provider says client authentication failed.',
                    OAuthProviderException::class
                )
            )
            ->type(OAuthToken::class);

        return $this->execute($_reqBuilder, $_resHandler);
    }

    /**
     * Create a new OAuth 2 token.
     *
     * @param string $authorization Authorization header in Basic auth format
     * @param string $code Authorization Code
     * @param string $redirectUri Redirect Uri
     * @param array|null $fieldParameters Additional optional form parameters are supported by this
     *        endpoint
     *
     * @return OAuthToken Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function requestTokenOAuthACG(
        string $authorization,
        string $code,
        string $redirectUri,
        array $fieldParameters = null
    ): OAuthToken {
        $_reqBuilder = $this->requestBuilder(RequestMethod::POST, '/oauth2/non-auth-server/token')
            ->parameters(
                FormParam::init('grant_type', 'authorization_code'),
                HeaderParam::init('Authorization', $authorization),
                FormParam::init('code', $code),
                FormParam::init('redirect_uri', $redirectUri),
                AdditionalFormParams::init($fieldParameters)
            );

        $_resHandler = $this->responseHandler()
            ->throwErrorOn(
                '400',
                ErrorType::init('OAuth 2 provider returned an error.', OAuthProviderException::class)
            )
            ->throwErrorOn(
                '401',
                ErrorType::init(
                    'OAuth 2 provider says client authentication failed.',
                    OAuthProviderException::class
                )
            )
            ->type(OAuthToken::class);

        return $this->execute($_reqBuilder, $_resHandler);
    }

    /**
     * Obtain a new access token using a refresh token
     *
     * @param string $authorization Authorization header in Basic auth format
     * @param string $refreshToken Refresh token
     * @param string|null $scope Requested scopes as a space-delimited list.
     * @param array|null $fieldParameters Additional optional form parameters are supported by this
     *        endpoint
     *
     * @return OAuthToken Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function refreshTokenOAuthACG(
        string $authorization,
        string $refreshToken,
        ?string $scope = null,
        array $fieldParameters = null
    ): OAuthToken {
        $_reqBuilder = $this->requestBuilder(RequestMethod::POST, '/oauth2/non-auth-server/token')
            ->parameters(
                FormParam::init('grant_type', 'refresh_token'),
                HeaderParam::init('Authorization', $authorization),
                FormParam::init('refresh_token', $refreshToken),
                FormParam::init('scope', $scope),
                AdditionalFormParams::init($fieldParameters)
            );

        $_resHandler = $this->responseHandler()
            ->throwErrorOn(
                '400',
                ErrorType::init('OAuth 2 provider returned an error.', OAuthProviderException::class)
            )
            ->throwErrorOn(
                '401',
                ErrorType::init(
                    'OAuth 2 provider says client authentication failed.',
                    OAuthProviderException::class
                )
            )
            ->type(OAuthToken::class);

        return $this->execute($_reqBuilder, $_resHandler);
    }

    /**
     * Create a new OAuth 2 token.
     *
     * @param string $authorization Authorization header in Basic auth format
     * @param string $username Resource owner username
     * @param string $password Resource owner password
     * @param string|null $scope Requested scopes as a space-delimited list.
     * @param array|null $fieldParameters Additional optional form parameters are supported by this
     *        endpoint
     *
     * @return OAuthToken Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function requestTokenOAuthROPCG(
        string $authorization,
        string $username,
        string $password,
        ?string $scope = null,
        array $fieldParameters = null
    ): OAuthToken {
        $_reqBuilder = $this->requestBuilder(RequestMethod::POST, '/oauth2/non-auth-server/token')
            ->parameters(
                FormParam::init('grant_type', 'password'),
                HeaderParam::init('Authorization', $authorization),
                FormParam::init('username', $username),
                FormParam::init('password', $password),
                FormParam::init('scope', $scope),
                AdditionalFormParams::init($fieldParameters)
            );

        $_resHandler = $this->responseHandler()
            ->throwErrorOn(
                '400',
                ErrorType::init('OAuth 2 provider returned an error.', OAuthProviderException::class)
            )
            ->throwErrorOn(
                '401',
                ErrorType::init(
                    'OAuth 2 provider says client authentication failed.',
                    OAuthProviderException::class
                )
            )
            ->type(OAuthToken::class);

        return $this->execute($_reqBuilder, $_resHandler);
    }

    /**
     * Obtain a new access token using a refresh token
     *
     * @param string $authorization Authorization header in Basic auth format
     * @param string $refreshToken Refresh token
     * @param string|null $scope Requested scopes as a space-delimited list.
     * @param array|null $fieldParameters Additional optional form parameters are supported by this
     *        endpoint
     *
     * @return OAuthToken Response from the API call
     *
     * @throws ApiException Thrown if API call fails
     */
    public function refreshTokenOAuthROPCG(
        string $authorization,
        string $refreshToken,
        ?string $scope = null,
        array $fieldParameters = null
    ): OAuthToken {
        $_reqBuilder = $this->requestBuilder(RequestMethod::POST, '/oauth2/non-auth-server/token')
            ->parameters(
                FormParam::init('grant_type', 'refresh_token'),
                HeaderParam::init('Authorization', $authorization),
                FormParam::init('refresh_token', $refreshToken),
                FormParam::init('scope', $scope),
                AdditionalFormParams::init($fieldParameters)
            );

        $_resHandler = $this->responseHandler()
            ->throwErrorOn(
                '400',
                ErrorType::init('OAuth 2 provider returned an error.', OAuthProviderException::class)
            )
            ->throwErrorOn(
                '401',
                ErrorType::init(
                    'OAuth 2 provider says client authentication failed.',
                    OAuthProviderException::class
                )
            )
            ->type(OAuthToken::class);

        return $this->execute($_reqBuilder, $_resHandler);
    }
}
