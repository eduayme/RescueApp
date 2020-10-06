<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvolvedPerson extends Model
{
    public $table = 'involved_people';

    protected $fillable = [
        'search_id',
        'name',
        'total_people',
        'vehicle',
        'phone_number',
        'people',
    ];

    public function search()
    {
        return $this->belongsTo('App\Search', 'search_id', 'search_id');
    }
}
