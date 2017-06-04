<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'member';

    protected $fillable = [
        'id', 'class_id', 'numbers', 'firstname', 'birthday', 'identity_id', 'guardian', 'vegetarianism', 'status', 'updated_at', 'created_at'
    ];
}
