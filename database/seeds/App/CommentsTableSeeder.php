<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class CommentsTableSeeder extends Seeder
{
    public function run()
    {
        TestDummy::times(50)->create('App\Comment');
    }
}
