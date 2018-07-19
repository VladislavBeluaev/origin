<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\LessonFilters;
use Illuminate\Http\Request;
class Lesson extends Model
{
	
	public static function filter(Request $request)
	{
		$filters = $request->all();
		$lesson = new static;
		foreach ($filters as $name => $value) {
			$methodName = 'scope'.ucfirst($name);
			if(method_exists($lesson,$methodName))
			{
				call_user_func_array(array($lesson,$name),array_filter(array($value)));
			}
		}
		return $lesson;
		
	}

	protected function getRequestFilters()
	{
		return $request->all();
	}

     public function scopePopular($query,$sort ='asc')
    {	
   		return $query->orderBy('views','desc');
    }

   // public function scopeFilterByDifficulty($query,Request $request)
   // {
   // 		return $request->has('difficulty')?$query->whereDifficulty($request->difficulty):$query;
   // }
}
