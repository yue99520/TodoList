<?php

namespace App;

use Exception;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($task) {
            $grids = $task->grids()->get();

            $ids = $grids->transform(function ($item, $key) {
                return $item->id;
            });

            Grid::query()->whereIn('id', $ids)->delete();
        });
    }


    function setGrid(Column $column, $value)
    {
        $grid = new Grid();
        $grid->content = $value;
        $grid->column_id = $column->id;
        $this->grids()->save($grid);
        return $grid;
    }

    function grids()
    {
        return $this->hasMany(Grid::class);
    }

    function project()
    {
        return $this->belongsTo(Project::class);
    }
}
