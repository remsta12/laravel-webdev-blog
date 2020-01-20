<?php

use Illuminate\Database\Seeder;
use App\Post;


class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = new Post();
        $post->author_id = 1;
        $post->name = "Malcolm Delughe";
        $post->slug = "F1rst";
        $post->title = "The First One";
        $post->excerpt = "This is the first post, welcome to my blog website project and enjoy your stay.";
        $post->body = "This is the first post, welcome to my blog website project and enjoy your stay. There is not much here for me to say other than what has already been written in the about page. This is mainly for testing the database migrations";
        $post->image = null;

        $post->save();

    }
}
