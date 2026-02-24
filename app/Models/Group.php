<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';
    protected $primaryKey = 'id';
    protected $fillable = [
        'search_id',
        'is_active',
        'vehicle',
        'broadcast',
        'gps',
        'people_involved',
    ];

    public function search()
    {
        return $this->belongsTo('App\Models\Search', 'search_id');
    }
}
