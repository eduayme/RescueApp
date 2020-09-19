<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncidentImage extends Model
{
    protected $guarded = [];
    protected $fillable = [
        'id',
        'incident_id',
        'photo',
    ];

    public $table = 'incidents_images';
}
