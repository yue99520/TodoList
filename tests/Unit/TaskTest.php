<?php

namespace Tests\Unit;

use App\Column;
use App\Grid;
use App\Project;
use App\Task;
use Tests\TestCase;

class TaskTest extends TestCase
{
    function testProjectHasTasks()
    {
        $project = factory(Project::class)->create();
        $task = factory(Task::class)->create();

        $project->tasks()->save($task);

        $this->assertEquals($project->id, $task->project_id);
    }

    function testTaskHasRows()
    {
        $project = factory(Project::class)->create();
        $task = factory(Task::class)->create([
            'project_id' => $project->id,
        ]);
        $column = factory(Column::class)->create([
            'project_id' => $project->id,
        ]);

        $grid = $task->setGrid($column, 'hello');
        $this->assertEquals($task->id, $grid->task_id);
        $this->assertEquals($column->id, $grid->column_id);
    }

    function testTaskDelete()
    {
        $project = factory(Project::class)->create();
        $task = factory(Task::class)->create([
            'project_id' => $project->id,
        ]);
        $column = factory(Column::class)->create([
            'project_id' => $project->id,
        ]);

        $grid = $task->setGrid($column, 'hello');

        $task->delete();

        $this->assertFalse(Task::query()->where('id', $task->id)->exists());
        $this->assertFalse(Grid::query()->where('id', $grid->id)->exists());
    }
}
