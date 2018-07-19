<?php

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
        App\Post::truncate();
        App\Comment::truncate();

        $this->call(UsersTableSeeder::class);
        $this->call(DocumentTableSeeder::class);
        $this->call(LessonTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(CommentsTableSeeder::class);

    }
}
