<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JourneyTimeline extends Model
{
    use SoftDeletes;

    protected $table = 'journey_timelines';

    protected $fillable = [
        'year',
        'title',
        'description',
        'image',
        'image_position',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active'  => 'boolean',
        'sort_order' => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
