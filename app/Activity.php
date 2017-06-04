<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = "activity";

    protected $fillable = [
        'id', 'title', 'location', 'activity_date', 'created_at', 'updated_at'
    ];
}
