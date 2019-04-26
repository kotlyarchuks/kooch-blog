<?php

namespace Tests\Feature;

use App\Post;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewPostTest extends TestCase {

    use DatabaseMigrations;

    /** @test * */
    function user_can_view_post()
    {
        //create post
        $post = Post::create([
            'title'        => 'First Post',
            'body'         => 'Yay, body',
        ]);
        //visit route
        $response = $this->get("/posts/{$post->id}");
        //assert status code and text
        $response->assertStatus(200);
        $response->assertSee('First Post');
        $response->assertSee('Yay, body');
        $response->assertSee($post->created_at->toDateTimeString());
    }

    /** @test * */
    function user_can_view_404_if_post_not_found()
    {
        $response = $this->get("/posts/97");

        $response->assertStatus(404);
    }
}
