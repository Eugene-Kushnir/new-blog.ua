<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
	// Mass assigned
	protected $guarded = [];

	// Mutators
	public  function setSlugAttribute($value){
		$this->attributes['slug'] = Str::slug( mb_substr($this->title , 0, 40) . "-". \Carbon\Carbon::now()->format('dmyHi'), '-');
	}

    // Get children category
	public function children(){
		return $this->hasMany(self::class,'parent_id');
	}
}
