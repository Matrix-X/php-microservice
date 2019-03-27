<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->get('/');

        $this->assertEquals(
            $this->app->version(), $this->response->getContent()
        );
    }

    public function testFailAssertArrayHasKey()
    {
        $dummy = new App\Dummy();
        $this->assertArrayHasKey('storage', $dummy::getConfigArray());
    }

    public function testAssertClassHasAttribute()
    {
        $this->assertClassHasAttribute('foo', App\Dummy::class);
        $this->assertClassHasAttribute('bar', App\Dummy::class);
    }

    public function testAssertClassHasStaticAttribute()
    {
        $this->assertClassHasStaticAttribute('availableLocales',
            App\Dummy::class);
    }
}
