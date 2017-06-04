<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    protected $table = "insurance";

    protected $fillable = [
        'id', 'users', 'groups', 'created_at', 'updated_at'
    ];
}
