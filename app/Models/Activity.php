<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'name',
        'activity_group_id',
        'description',
        'status',
        'completed_at'
    ];

    public function activityGroup()
    {
        return $this->belongsTo(ActivityGroup::class);
    }
}
