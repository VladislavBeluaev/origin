<?php
namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
trait LessonFilters
{



    // protected $request;
    // protected $builder;
    // public function __construct(Request $request,Builder $builder)
    // {
    //     $this->request = $request;
    //     $this->builder = $builder;
    // }
    // protected function popular()
    // {
    //     return $this->builder->orderBy('views','desc');
    // }

    // public function apply()
    // {
    //     foreach ($this->requestFilters() as $name => $value) {
            
    //         if(method_exists($this, $name))
    //         {
    //             call_user_func_array(array($this,$name), array($value));
    //         }
    //     }
    // }

    // protected function requestFilters()
    // {
    //     return $this->request->all();
    // }
}
