<?php

namespace Pirectus;

use Pirectus\QueryBuilder\ItemsQueryBuilder;

/**
 *  Client for Directus Api 9
 *
 *  @author Björn Hase, Tentakelfabrik
 *  @license http://opensource.org/licenses/MIT The MIT License
 *  @link https://gitea.tentakelfabrik.de/tentakelfabrik/pirectus
 *
 */

class Pirectus
{
    /** url of api */
    private $url;

    /** options for client */
    private $options;

    /**
     *
     *
     *  @param string $url
     *  @param Array  $options
     *
     */
    public function __construct(string $url, array $options = [])
    {
        $this->url = $url;
        $this->options = $options;
    }

    /**
     *  set name for items-collection and create ItemsQueryBuilder
     *
     *  @param  string $name
     *  @return \Pirectus\ItemsQueryBuilder
     *
     */
    public function items(string $name)
    {
        $query = [
            'endpoint' => '/items/'.$name,
            'parameters' => []
        ];

        return new ItemsQueryBuilder($query, $this->url, $this->options);
    }
}