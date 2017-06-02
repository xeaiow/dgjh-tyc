<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttendBook extends Model
{
    protected $table = "attend_book";

    protected $fillable = [
        'id', 'title', 'description', 'quorum', 'attended', 'start', 'end', 'created_at', 'updated_at'
    ];
}
