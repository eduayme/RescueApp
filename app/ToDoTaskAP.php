<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ToDoTaskAP extends Model
{
    protected $guarded = [];
    protected $fillable = [
        'id',
        'id_action_plan',
        'description',
        'state',
    ];

    use SoftDeletes;

    public $table = 'to_do_tasks_ap';

    public function action_plan()
    {
        return $this->belongsTo('App\ActionPlans', 'id_action_plan', 'id');
    }
}
