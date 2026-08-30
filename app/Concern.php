<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\SisterProject;

class Concern extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    protected $guarded = [];

    protected $dates = ['deleted_at'];

    public function User()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function sisterProjects()
    {
        return $this->hasMany(SisterProject::class, 'project_id', 'id');
    }
}
