<?php
namespace App;
class Dummy
{

    public $foo;


    public static $availableLocales = [
        'en_GB',
        'en_US',
        'es_ES',
        'gl_ES'
    ];


    public static function getConfigArray()
    {
        return [
            'debug'   => true,
            'storage' => [
                'host' => 'localhost',
                'port' => 5432,
                'user' => 'my-user',
                'pass' => 'my-secret-password'
            ] ];
    }
}

