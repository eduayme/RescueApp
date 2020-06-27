<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToDoTaskAP extends Model
{
    protected $guarded = [];
    protected $fillable = [
        'id',
        'action_plan_id',
        'description',
        'state',
    ];

    public $table = 'to_do_tasks_ap';

    public function action_plan()
    {
        return $this->belongsTo('App\ActionPlan', 'action_plan_id', 'id');
    }
}
