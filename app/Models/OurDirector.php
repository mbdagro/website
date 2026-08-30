<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OurDirector extends Model
{
    use SoftDeletes;
		
		public $timestamps = true;
		
		protected $guarded = [];
		
		protected $dates = ['deleted_at'];
		
		public function User()
		{
			return $this->belongsTo('App\User','user_id','id');
			
		}
}
