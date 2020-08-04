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

    public function user_creation()
    {
        return $this->belongsTo('App\User', 'user_creation_id', 'id');
    }

    public function user_modification()
    {
        return $this->belongsTo('App\User', 'user_modification_id', 'id');
    }

    public function images()
    {
        return $this->hasMany('App\IncidentImage', 'incident_id', 'id');
    }
}
