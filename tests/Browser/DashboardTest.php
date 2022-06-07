<?php

namespace Tests\Browser;

use App\Models\User;
use Tests\DuskTestCase;

class DashboardTest extends DuskTestCase
{
    /**
     * Check Dashboard login with user.
     *
     * @return void
     */
    public function test_login_dashboard()
    {
        $user = User::find(1);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('email', $user->email)
                    ->type('password', 'test')
                    ->click('form > div.flex.items-center.justify-end.mt-4 > button')
                    ->assertPathIs('/dashboard')
                    ->assertSee('پست ها');
        });
    }

    /**
     * A Create Post Route test.
     *
     * @return void
     */
    public function test_create_post()
    {
        $this->browse(function ($browser) {
            $browser->loginAs(User::find(1))->visit('/dashboard/posts/create')
                    ->type('title', 'Test Title ' . rand(1, 100))
                    ->type('content', 'Test Content of Post for Testing ' . rand(1, 100))
                    ->type('slug', 'test-title-' . rand(1, 100))
                    ->clickAndWaitForReload('form > button')
                    ->assertPathIs('/dashboard');
        });
    }

    /**
     * A Update Post test.
     *
     * @return void
     */
    public function test_update_post()
    {
        $this->browse(function ($browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/dashboard')
                    ->clickAndWaitForReload('div.card-body.sm\:text-right > li:nth-child(1) span')
                    ->assertPathBeginsWith('/dashboard/posts/edit/')
                    ->type('title', 'Edited Test Title ' . rand(1, 100))
                    ->type('content', 'Edited Test Content of Post for Testing ' . rand(1, 100))
                    ->type('slug', 'edited-test-title-' . rand(1, 100))
                    ->clickAndWaitForReload('form > button')
                    ->assertPathIs('/dashboard');
        });
    }

    /**
     * A Delete Post test.
     *
     * @return void
     */
    public function test_delete_post()
    {
        $this->browse(function ($browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/dashboard')
                    ->clickAndWaitForReload('div.card-body.sm\:text-right > li:nth-child(1) span')
                    ->assertPathBeginsWith('/dashboard/posts/edit/')
                    ->clickAndWaitForReload('form .btn-danger')
                    ->assertPathIs('/dashboard');
        });
    }
}
