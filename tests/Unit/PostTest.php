<?php

namespace Tests\Unit;

use App\Post;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    use DatabaseMigrations;

    /** @test * */
    function can_format_created_date_in_readable_form()
    {
        $post = factory(Post::class)->create();

        $formattedDate = $post->created_at();
        $this->assertEquals($post->created_at->toDateTimeString(), $formattedDate);
    }
}
