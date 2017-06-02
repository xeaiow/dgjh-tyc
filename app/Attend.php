<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attend extends Model
{
    protected $table = "attend";

    protected $fillable = [
        'id', 'groups', 'record', 'username', 'created_at', 'updated_at'
    ];
}
