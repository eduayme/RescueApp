<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncidentImage extends Model
{
    public $table = 'incidents_images';

    protected $primaryKey = 'id';
    protected $fillable = [
        'incident_id',
        'photo',
    ];
}
