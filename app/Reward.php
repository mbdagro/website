<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reward extends Model
{
    use SoftDeletes;
    public $timestamps = true;

    protected $guarded = [];
    protected $dates = ['deleted_at'];

    public function User()
    {
        return $this->hasOne('App\User','id','user_id');
    }
    public function Product()
    {
        return $this->belongsTo('App\ProductService','product_id','id');
    }
}
