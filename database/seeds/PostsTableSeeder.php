<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 5; $i++ ) {
            $new_post = new Post();

            $new_post->title = 'title ' . ($i + 1);
            $new_post->slug = Str::slug($new_post->title, '-' );
            $new_post->description = '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris ';

            $new_post->save();
    }
  }
}
