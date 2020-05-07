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
        'description',
        'search_id',
    ];

    use SoftDeletes;

    public $table = 'action_plans';

    public function search()
    {
        return $this->belongsTo('App\Search', 'search_id');
    }

    public function to_do_tasks()
    {
        return $this->hasMany('App\ToDoTaskAP', 'action_plan_id', 'id');
    }
}
