<?php


namespace Tests\Browser;

use Illuminate\Foundation\Testing\RefreshDatabase;

class BlogTest extends \Tests\DuskTestCase
{
    // use RefreshDatabase;

    /**
     * A blog index route test.
     *
     * @return void
     */
    public function test_blog_index_can_be_rendered()
    {
        $this->browse(function ($browser) {
            $browser->visit('/')->assertSee('بلاگ');
        });
    }

    /**
     * A blog single post route test.
     *
     * @return void
     */
    public function test_blog_post_single_can_be_rendered()
    {
        $this->browse(function ($browser) {
            $browser->visit('/')
                    ->click('.max-w-6xl div.container > div > div:nth-child(1) a')
                ->assertPathBeginsWith('/post');
        });
    }
}
