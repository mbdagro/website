<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallary extends Model
{
	use SoftDeletes;

	public $timestamps = true;

	protected $guarded = [];

	protected $dates = ['deleted_at'];
	protected $casts = [
		'multi_image' => 'array',
	];
	public function User()
	{
		return $this->belongsTo('App\User', 'user_id', 'id');
	}
	public function Category()
	{
		return $this->belongsTo('App\Category', 'category_id', 'id');
	}
}
