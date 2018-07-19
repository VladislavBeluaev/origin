<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Document extends Model
{
	protected $fillable = ['title','body'];
	public static function boot()
	{
		parent::boot();
		static::updating(function($document){

			$document->adjust();
		});

		static::created(function($document){

			$document->users()->attach(Auth::id(),[

			'creator'=>true
			]);
		});
	}
    public function users()
    {
    	return $this->belongsToMany(User::class,'adjustments','document_id','user_id')->withTimestamps()->withPivot(['creator','before','after'])->latest('pivot_updated_at');
    }

    public function creatorDocument()
    {
    	return $this->users()->wherePivot('creator', 1)->first();
    }
    public function getBodyAttribute($value){

    	return substr($this->attributes['body'],0,50);
    }

    protected function adjust()
    {
    	$userId = Auth::id();


    	$this->users()->attach($userId,$this->getDiff());
    }

    protected function getDiff()
    {
    	$changed = $this->getDirty();
    	$before = json_encode($changed);
		$after = json_encode(array_intersect_key($this->fresh()->toArray(), $changed));
		return compact('before','after');

    }
}
