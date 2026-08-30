<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Concern;
class SisterProject extends Model
{
    use SoftDeletes;
		
		public $timestamps = true;
		
		protected $guarded = [];
		
		protected $dates = ['deleted_at'];
		
		public function User()
		{
			return $this->belongsTo('App\User','user_id','id');
			
		}
		public function Project()
		{
			return $this->belongsTo(Concern::class, 'project_id', 'id');
		}
		
		public function Concern()
		{
			return $this->belongsTo(Concern::class, 'project_id', 'id');
		}
		public function sisterProjects()
		{
			return $this->hasMany(SisterProject::class, 'project_id', 'id');
		}
}
