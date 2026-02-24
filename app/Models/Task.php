<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public $table = 'tasks';

    protected $primaryKey = 'id';
    protected $fillable = [
        'search_id',
        'sector',
        'status',
        'group',
        'start',
        'end',
        'type',
        'description',
        'trackingDevice',
        'gpx',
        'gpxFileName',
        'gpxFile',
    ];

    protected $casts = [
        'start'      => 'datetime:Y-m-d H:i:s',
        'end'        => 'datetime:Y-m-d H:i:s',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];
}
