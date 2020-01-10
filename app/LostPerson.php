<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LostPerson extends Model
{
    public $table = 'lost_people';

    protected $fillable = [
        'id',
        'id_search',
        'found',
        'name',
        'name_respond',
        'age',
        'phone_number',
        'whatsapp_or_gps',
        'profile',
        'physical_appearance',
        'clothes',
        'other',

        // person status
        'physical_condition',
        'diseases_or_injuries',
        'medication',
        'discapacities_or_limitations',

        // vehicle
        'model_vehicle',
        'color_vehicle',
        'car_plate_number',
    ];

    public function search()
    {
        return $this->belongsTo('App\Search', 'id_search', 'id_search');
    }
}
