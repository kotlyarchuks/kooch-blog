<?php

namespace Tests\Feature;

use App\Post;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewAllPostsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test * */
    function user_can_view_list_of_all_posts()
    {
        $post1 = factory(Post::class)->create();
        $post2 = factory(Post::class)->create();

        $response = $this->get('/posts');
        $response->assertStatus(200);
        $response->assertSee($post1->title);
        $response->assertSee($post2->title);
    }
}
