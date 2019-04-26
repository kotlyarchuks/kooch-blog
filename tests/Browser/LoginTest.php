<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;

    /** @test *
     * @group login
     */
    function user_can_login()
    {
        $user = factory(User::class)->create([
            'email' => 'lul@test.com',
            'password' => bcrypt('feralpower')
        ]);

        $this->browse(function(Browser $browser) use($user) {
            $browser->visit('/login')
                    ->type('email', 'lul@test.com')
                    ->type('password', 'feralpower')
                    ->press('Login')
                    ->assertPathIs('/home');
        });
    }
}
