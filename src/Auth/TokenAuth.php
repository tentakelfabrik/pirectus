<?php

namespace Pirectus\Auth;

/**
 *  Auth for Token in Directus
 *
 *  @author Björn Hase, Tentakelfabrik
 *  @license http://opensource.org/licenses/MIT The MIT License
 *  @link https://gitea.tentakelfabrik.de/tentakelfabrik/pirectus
 *
 */

class TokenAuth
{
    /** token for auth */
    private $token = NULL;

    /**
     *  setting token
     *
     *  @param string $token
     *
     */
    public function __construct(string $token)
    {
        $this->token = $token;
    }

    /**
     *  getting token
     *
     *  @return string
     *
     */
    public function getToken()
    {
        return $this->token;
    }
}