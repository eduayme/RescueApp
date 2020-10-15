<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToDoTaskAP extends Model
{
    public $table = 'to_do_tasks_ap';

    protected $primaryKey = 'id';
    protected $fillable = [
        'action_plan_id',
        'name',
        'state',
    ];

    public function getName()
    {
        $name_translation = 'to_do_tasks.'.$this->name;

        return __($name_translation);
    }

    public function action_plan()
    {
        return $this->belongsTo('App\ActionPlan', 'action_plan_id', 'id');
    }
}
