<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    protected $guarded = [];
    protected $fillable = [
        'id',
        'search_id',
        'user_creation_id',
        'user_modification_id',
        'date',
        'description',
    ];

    public $table = 'incidents';

    public function images()
    {
        return $this->hasMany('App\IncidentsImages', 'incident_image_id', 'id');
    }
}
