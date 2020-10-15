<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LostPerson extends Model
{
    public $table = 'lost_people';

    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'search_id',
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
        return $this->belongsTo('App\Search', 'search_id', 'search_id');
    }
}
