<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($task) {
            $columns = $task->columns()->get();

            $ids = $columns->transform(function ($item, $key) {
                return $item->id;
            });

            Column::query()->whereIn('id', $ids)->delete();
        });
    }


    function addColumn(Column $column)
    {
        $column->task_id = $this->id;
        $column->save();
    }

    function columns()
    {
        return $this->hasMany(Column::class);
    }

    function project()
    {
        return $this->belongsTo(Project::class);
    }
}
