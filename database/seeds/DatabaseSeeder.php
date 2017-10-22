<?php

use App\Model\Category;
use App\Model\Post;
use App\Model\Tuto;
use App\Model\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PostTableSeeder::class);
        $this->call(TutoTableSeeder::class);

        $posts = Post::all();
        $users = User::all();
        $tutos = Tuto::all();
        $categories = Category::all();

        foreach ($posts as $post) {
            foreach ($users as $user) {
                if ($post->user_id === $user->id) {
                    $post->user()->associate($user);
                    $user->posts()->attach($post);
                }
            }
            foreach ($categories as $category) {
                if ($post->category_id === $category->id) {
                    $post->category()->associate($category);
                    $category->posts()->attach($post);
                }
            }
        }
        foreach ($tutos as $tuto) {
            foreach ($users as $user) {
                if ($tuto->user_id === $user->id) {
                    $tuto->user()->associate($user);
                    $user->tutos()->attach($tuto);
                }
            }
            foreach ($categories as $category) {
                if ($tuto->category_id === $category->id) {
                    $tuto->category()->associate($category);
                    $category->tutos()->attach($tuto);
                }
            }
        }
    }
}
