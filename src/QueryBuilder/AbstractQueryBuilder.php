<?php

namespace Pirectus\QueryBuilder;

use Pirectus\Request;

/**
 *  Abstract Builder for Query to Directus
 *
 *  @author Björn Hase, Tentakelfabrik
 *  @license http://opensource.org/licenses/MIT The MIT License
 *  @link https://gitea.tentakelfabrik.de/tentakelfabrik/pirectus
 *
 */

abstract class AbstractQueryBuilder
{
    /** query ad array */
    protected $query;

    /** url to directus api  */
    protected $url;

    /** request object with guzzle/client */
    protected $request;

    /**
     *
     *
     *  @param array $query
     *  @param array $url
     *  @param array $options
     *
     */
    public function __construct(array $query, string $url, array $options)
    {
        $this->query = $query;
        $this->url = $url;
        $this->request = new Request($url, $options);
    }

    /**
     *  request get
     *
     *
     *  @return array
     *
     */
    public function find()
    {
        $results = $this->request->get($this->query);

        return $results;
    }

    /**
     *  request get, getting first result
     *
     *
     *  @return array
     *
     */
    public function findOne()
    {
        $results = $this->request->get($this->query);

        // if result has data, reduce to one
        if (isset($results['data']) && isset($results['data'][0])) {
            $results['data'] = $results['data'][0];
        }

        return $result;
    }

    /**
     *  request post, send data to create
     *
     *
     *  @param  array  $data
     *  @return array
     *
     */
    public function post(array $data)
    {
        $response = $this->request->post($this->query, $data);

        return $response;
    }

    /**
     *  request patch, send data to update
     *
     *
     *  @param  string $id
     *  @param  array  $data
     *  @return
     *
     */
    public function patch(string $id, array $data)
    {
        $response = $this->request->patch($id, $this->query, $data);
        return $response;
    }
}