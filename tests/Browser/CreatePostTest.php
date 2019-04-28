<?php

namespace Tests\Browser;

use App\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Dusk\Concerns\ProvidesBrowser;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreatePostTest extends DuskTestCase
{
    use DatabaseMigrations;
    use ProvidesBrowser;

    /** @test * */
    function user_can_create_post()
    {
        //Arrange
        $user = factory(User::class)->create();
        //Act
        $this->browse(function(Browser $browser) use($user){
            $browser->loginAs($user)
                    ->visit('posts/create')
                    ->type('title', 'My First Post')
                    ->type('body', 'Body of my first post')
                    ->press('Create')
                    ->assertPathIs('/posts')
                    ->assertSee('My First Post');
        });
    }

    /** @test * */
    function unauthenticated_user_cant_create_posts()
    {
        $this->browse(function(Browser $browser) {
            $browser->visit('posts/create')
                ->assertPathIs('/login');
        });
    }
}
