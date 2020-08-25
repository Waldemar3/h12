<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{


    public function run()
    {
        factory(\App\Category::class, 10)->create();
        factory(\App\Tag::class, 20)->create();

        factory(\App\User::class, 10)->create()
            ->each(function ($user){

            $user->post()->saveMany(factory(\App\Post::class, 10)->make(['user_id' => $user->id])
                ->each(function ($post) {

                $category = \App\Category::all()->random();
                $category->post()->save($post);

                $tag = \App\Tag::all()->pluck('id')->random(rand(3,5));
                $post->tag()->attach($tag);
            }));
        });
    }
}
