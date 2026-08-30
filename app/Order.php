<?php
	
	namespace App;
	
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Database\Eloquent\SoftDeletes;
	
	class Order extends Model
	{
		use SoftDeletes;
		
		public $timestamps = true;
		
		protected $guarded = [];
		
		protected $dates = ['deleted_at'];
		
		public function User()
		{
			return $this->belongsTo('App\User','user_id','id');
			
		}
		
		public function ReceiveBy()
		{
			return $this->belongsTo('App\User','order_by','id');
			
		}
		
		public function Attachment()
		{
			return $this->hasMany('App\Attachment','order_id','id');
			
		}
		
	}
