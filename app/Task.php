<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'search_id',
        'Sector',
        'Status',
        'Group',
        'Start',
        'End',
        'Type',
        'Description',
        'Gpx',
    ];
}
