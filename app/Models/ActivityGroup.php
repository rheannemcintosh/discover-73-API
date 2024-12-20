<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityGroup extends Model
{
    protected $fillable = [
        'name',
        'description',
        'status'
    ];

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
}
