<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    protected $guarded = [];

    protected $dates = ['deleted_at'];

    public function User()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function productList()
    {
        return $this->hasMany('App\ProductService');
    }
	 public function subCategoryList()
    {
        return $this->hasMany('App\SubCategory');
    }
}
