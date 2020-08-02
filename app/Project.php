<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($project) {
            $tasks = $project->tasks()->get();
            $ids = $tasks->transform(function ($item, $key) {
                return $item->id;
            });

            Task::query()->whereIn('id', $ids)->delete();
        });
    }

    function tasks()
    {
        return $this->hasMany(Task::class);
    }

    function addTasks($task)
    {
        if (is_array($task)) {
            return $this->tasks()->saveMany($task);
        } else {
            return $this->tasks()->save($task);
        }
    }

    function attributes()
    {
        return $this->hasMany(Attribute::class);
    }
}
