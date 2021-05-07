<?php
/**
 * Created by PhpStorm.
 * User: Tareq
 * Date: 5/27/2019
 * Time: 12:36 PM
 *
 * @see https://docs.shoplazza.com/en/api/graphql-admin-api GraphQL Admin API
 */

namespace PHPShoplazza;


use PHPShoplazza\Exception\ApiException;
use PHPShoplazza\Exception\CurlException;
use PHPShoplazza\Exception\SdkException;

class GraphQL extends ShoplazzaResource
{

    /**
     * @inheritdoc
     */
    protected function getResourcePath()
    {
        return 'graphql';
    }

    /**
     * Call POST method for any GraphQL request
     *
     * @param string $graphQL A valid GraphQL String. @see https://docs.shoplazza.com/en/api/graphql-admin-api/graphiql-builder GraphiQL builder - you can build your graphql string from here.
     * @param string $url
     * @param bool $wrapData
     * @param array|null $variables
     *
     * @uses HttpRequestGraphQL::post() to send the HTTP request
     * @throws ApiException if the response has an error specified
     * @throws CurlException if response received with unexpected HTTP code.
     *
     * @return array
     */
    public function post($graphQL, $url = null, $wrapData = false, $variables = null)
    {
        if (!$url) $url = $this->generateUrl();

        $response = HttpRequestGraphQL::post($url, $graphQL, $this->httpHeaders, $variables);

        return $this->processResponse($response);
    }

    /**
     * @inheritdoc
     * @throws SdkException
     */
    public function get($urlParams = array(), $url = null, $dataKey = null)
    {
        throw new SdkException("Only POST method is allowed for GraphQL!");
    }

    /**
     * @inheritdoc
     * @throws SdkException
     */
    public function put($dataArray, $url = null, $wrapData = true)
    {
        throw new SdkException("Only POST method is allowed for GraphQL!");
    }

    /**
     * @inheritdoc
     * @throws SdkException
     */
    public function delete($urlParams = array(), $url = null)
    {
        throw new SdkException("Only POST method is allowed for GraphQL!");
    }
}