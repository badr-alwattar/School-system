<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Homework_solution extends Model
{
    protected $fillable = [
        'title', 'attachment', 'assignedToName', 'homework'
    ];
}
