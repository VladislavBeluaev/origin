<?php

namespace App\Http\Controllers;

use App\Lesson;
use App\LessonFilters;
use Illuminate\Http\Request;
class LessonController extends Controller
{
   public function index(Request $filters)
   {
   		// $lesson = new Lesson();
   		// //dd($lesson);
   		// return $lesson->filterByPopular($request)->filterByDifficulty($request)->get();
   		return Lesson::filter($filters)->get();

   // 	$lesson = \App\Lesson::all();
   // 	if($request->exists('popular'))
   // 	{
   // 		return $lesson->filterByPoplular();
   // 	}

   // 	if($request->has('difficulty'))
   // 	{
   // 		return $lesson->filterByDifficulty($request->difficulty);
   // 	}
   // 	return $lesson->get();
   // }
   	}
}
