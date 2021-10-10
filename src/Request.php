<?php

namespace Pirectus;

use Pirectus\Auth\TokenAuth;
use GuzzleHttp\Client;

/**
 *  Crete Requests, Parse Parameters and Response with Guzzle to Api
 *
 *
 *  @author Björn Hase, Tentakelfabrik
 *  @license http://opensource.org/licenses/MIT The MIT License
 *  @link https://gitea.tentakelfabrik.de/tentakelfabrik/pirectus
 *
 */

class Request
{
    /** client guzzle */
    private $client;

    /** options */
    private $options;

    /** headers */
    private $headers = [
        'Accept' => 'application/json',
        'Content-Type' => 'application/json'
    ];

    /**
     *
     *
     *  @param string $url
     *  @param array  $options
     *
     */
    public function __construct(string $url, array $options)
    {
        $this->options = $options;

        // create client with base url
        $this->client = new Client([
            'base_uri' => $url
        ]);
    }

    /**
     *  building http headers for request
     *
     *  @return array
     *
     */
    public function buildHeaders()
    {
        if (isset($this->options['auth']) && $this->options['auth'] instanceof TokenAuth) {
            $headers = array_merge($this->headers, [
                'Authorization' => 'Bearer '.$this->options['auth']->getToken()
            ]);
        }

        return $headers;
    }

    /**
     *  build parameters for query
     *
     *  @param  array $query
     *  @return string
     *
     */
    public function buildParameters(array $query)
    {
        //
        $parameters = [];

        //
        $result = '';

        if (isset($query['parameters']['filter'])) {
            $parameters['filter'] = json_encode($query['parameters']['filter']);
        }

        if (isset($query['parameters']['fields'])) {
            $parameters['fields'] = implode(',', $query['parameters']['fields']);
        }

        if (isset($query['parameters']['limit'])) {
            $parameters['limit'] = intval($query['parameters']['limit']);
        }

        if (isset($query['parameters']['offset'])) {
            $parameters['offset'] = intval($query['parameters']['offset']);
        }

        if (isset($query['parameters']['sort'])) {
            $parameters['sort'] = implode(',', $query['parameters']['sort']);
        }

        if (isset($query['parameters']['meta'])) {
            $parameters['meta'] = $query['parameters']['meta'];
        }

        if (isset($query['parameters']['search'])) {
            $parameters['search'] = $query['parameters']['search'];
        }

        if (isset($query['parameters']['groupBy'])) {
            $parameters['groupBy'] = intval($query['parameters']['sort']);
        }

        if (isset($query['parameters']['aggregate'])) {
            $parameters['meta'] = $query['parameters']['aggregate'];
        }

        if (isset($query['parameters']['alias'])) {
            $parameters['alias'] = $query['parameters']['alias'];
        }

        if (count($parameters) > 0) {
            $result = http_build_query($parameters);
        }

        return $result;
    }

    /**
     *  get entites in Directus Api
     *
     *  @param  array  $query
     *  @return mixed
     *
     */
    public function get(array $query)
    {
        $response = $this->client->request('get', $query['endpoint'], [
            'query' => $this->buildParameters($query),
            'headers' => $this->buildHeaders()
        ]);

        $results = json_decode($response->getBody(), true);

        return $results;
    }

    /**
     *  post single entity in Directus Api
     *
     *  @param  array  $query
     *  @param  array  $data
     *  @return mixed
     *
     */
    public function post(array $query, array $data)
    {
        $response = $this->client->request('post', $query['endpoint'], [
            'headers' => $this->buildHeaders(),
            'body' => json_encode($data)
        ]);

        $results = json_decode($response->getBody(), true);

        return $results;
    }

    /**
     *  patch single entity in Directus Api
     *
     *  @param  string $id
     *  @param  array  $query
     *  @param  array  $data
     *  @return mixed
     *
     */
    public function patch(string $id, array $query, array $data)
    {
        $response = $this->client->request('patch', $query['endpoint'].'/'.$id, [
            'headers' => $this->buildHeaders(),
            'body' => json_encode($data)
        ]);

        $results = json_decode($response->getBody(), true);

        return $results;
    }
}