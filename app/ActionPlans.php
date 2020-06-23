<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActionPlans extends Model
{
    protected $guarded = [];
    protected $fillable = [
        'id',
        'version',
        'description',
        'search_id',
    ];

    public $table = 'action_plans';

    public function search()
    {
        return $this->belongsTo('App\Search', 'search_id');
    }

    public function to_do_tasks()
    {
        return $this->hasMany('App\ToDoTaskAP', 'action_plan_id', 'id');
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($action_plan) { // before delete() method call this
            $action_plan->to_do_tasks()->delete();
        });
    }
}
