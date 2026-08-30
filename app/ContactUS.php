<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactUS extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    protected $guarded = [];

    protected $dates = ['deleted_at'];
	
	public function ProductService()
		{
			return $this->belongsTo('App\ProductService','product_serivice_id','id');
		}
	
}
