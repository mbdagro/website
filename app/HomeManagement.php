<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomeManagement extends Model
{
		use SoftDeletes;
		
		public $timestamps = true;
		
		protected $table = 'home_managements';
		
		protected $guarded = [];
		
		protected $dates = ['deleted_at'];
		
		public function User()
		{
			return $this->belongsTo('App\User','user_id','id');
			
		}
}
