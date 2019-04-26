<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreatePostTest extends TestCase
{
    use DatabaseMigrations;

    /** @test * */
    function can_create_post()
    {
        $post = ['title' => 'New Post', 'body' => 'Cool topic to discuss'];

        $this->post('/posts', $post);

        $this->assertDatabaseHas('posts', [
            'title' => $post['title'],
            'body' => $post['body']
        ]);
    }

    /** @test * */
    function cant_create_post_without_title_or_body()
    {
        $post = ['title' => '', 'body' => 'Cool topic to discuss'];

        $response = $this->post('/posts', $post);
        $response->assertStatus(302);
        $response->assertSessionHasErrors('title');

        $post = ['title' => 'New title', 'body' => ''];

        $response = $this->post('/posts', $post);
        $response->assertStatus(302);
        $response->assertSessionHasErrors('body');

    }
}
