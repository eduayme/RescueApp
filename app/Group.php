<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';
    protected $primaryKey = 'id';
    protected $fillable = ['search_id', 'status', 'vehicle', 'broadcast', 'gps', 'people_involved'];
    public $timestamps = true;

    public function search()
    {
        return $this->belongsTo('App\Search', 'search_id');
    }
}
