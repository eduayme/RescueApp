<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'search_id',
        'sector',
        'status',
        'group',
        'start',
        'end',
        'type',
        'description',
        'trackingDevice',
        'gpx',
        'gpxFileName',
        'gpxFile',
    ];
}
