<?php
/**
 * Created by PhpStorm.
 * User: michaelhu
 * Date: 2019/3/27
 * Time: 5:27 PM
 */

final class SecretsCache
{
    private $secretsMap = [];
    public function setSecret($secret)
    {
        $this->secretsMap[$secret] = $secret;
    }
    public function getSecret($secret)
    {
        return $this->secretsMap[$secret];
    }
}

