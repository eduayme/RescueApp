<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ToDoTaskAP extends Model
{
    protected $guarded = [];
    protected $fillable = [
        'id',
        'action_plan_id',
        'description',
        'state',
    ];

    use SoftDeletes;

    public $table = 'to_do_tasks_ap';

    public function action_plan()
    {
        return $this->belongsTo('App\ActionPlans', 'action_plan_id', 'id');
    }
}
