<?php

namespace Pirectus\Auth;

/**
 *
 *
 *  @author Björn Hase
 *  @license http://opensource.org/licenses/MIT The MIT License
 *  @link https://gitea.tentakelfabrik.de/tentakelfabrik/pirectus Gitea Repository
 *
 */

class TokenAuth
{
    /** */
    private $token = NULL;

    /**
     *  setting token
     *
     *  @param String $token
     *
     */
    public function __construct(String $token)
    {
        $this->token = $token;
    }

    /**
     *  getting token
     *
     *  @return String
     *
     */
    public function getToken()
    {
        return $this->token;
    }
}