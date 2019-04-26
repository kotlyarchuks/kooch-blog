<?php

namespace Tests\Browser;

use App\Post;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class BrowsePostFromList extends DuskTestCase
{
    use DatabaseMigrations;

    /** @test * */
    function user_can_browse_to_post_from_posts_list()
    {
        $post1 = factory(Post::class)->create();
        $post2 = factory(Post::class)->create();

        $this->browse(function(Browser $browser) use ($post1, $post2){
            $browser->visit('/posts')
                    ->assertSee($post1->title)
                    ->assertSee($post2->title)
                    ->clickLink($post2->title)
                    ->assertPathIs("/posts/{$post2->id}")
                    ->assertSee($post2->body);
        });
    }
}
