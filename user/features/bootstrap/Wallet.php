<?php
/**
 * Created by PhpStorm.
 * User: michaelhu
 * Date: 2019/3/27
 * Time: 5:28 PM
 */

final class Wallet implements \Countable
{
    private $secretsCache;
    private $secrets;
    public function __construct(SecretsCache $secretsCache)
    {
        $this->secretsCache = $secretsCache;
    }
    public function addSecret($secret)
    {
        $this->secrets[] = $secret;
    }
    public function count()
    {
        return count($this->secrets);
    }
}