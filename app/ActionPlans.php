<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActionPlans extends Model
{
    protected $guarded = [];
    protected $fillable = [
        'id',
        'version',
        'mapembed',
        'description',
        'task1',
        'task2',
        'task3',
        'task4',
        'task5',
        'task6',
        'search_id',
    ];

    use SoftDeletes;

    public $table = 'action_plans';

    public function search()
    {
        return $this->belongsTo('App\Search', 'search_id');
    }
}
