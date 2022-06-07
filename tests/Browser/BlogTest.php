<?php


namespace Tests\Browser;

class BlogTest extends \Tests\DuskTestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_index()
    {
        $this->browse(function ($browser) {
            $browser->visit('/')
                    ->assertSee('بلاگ');
        });
    }
}
