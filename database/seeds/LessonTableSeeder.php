<?php

use Illuminate\Database\Seeder;
use App\Lesson;
class LessonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Lesson::class,100)->create();
    }
}
