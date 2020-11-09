<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leader extends Model
{
    protected $table = 'leaders';
    protected $primaryKey = 'id';
    protected $fillable = ['search_id', 'leader_code', 'name', 'phone', 'start', 'end'];
    public $timestamps = true;
}
