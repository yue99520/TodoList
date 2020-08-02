<?php

namespace Tests\Unit;

use App\Column;
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

    function testTaskHasColumns()
    {
        $task = factory(Task::class)->create();

        $column = new Column();
        $column->type = 'boolean';
        $column->boolean = false;

        $task->columns()->save($column);

        $this->assertEquals($task->id, $column->task_id);
    }

    function testTaskDelete()
    {
        $task = factory(Task::class)->create();

        $column = new Column();
        $column->type = 'boolean';
        $column->boolean = false;

        $task->columns()->save($column);

        $task->delete();

        $this->assertFalse(Task::query()->where('id', $task->id)->exists());
        $this->assertFalse(Column::query()->where('id', $column->id)->exists());
    }
}
