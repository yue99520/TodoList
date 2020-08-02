<?php

namespace Tests\Unit;

use App\Project;
use App\Task;
use App\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    function testUserHasProjects()
    {
        $user = factory(User::class)->create();
        $projects = factory(Project::class, 10)->create([
            'user_id' => $user->id,
        ]);

        $this->assertCount(10, $user->projects()->get());
        $this->assertEquals($user->id, $projects->first()->user_id);
    }

    function testUserHasTasks()
    {
        $user = factory(User::class)->create();
        $project = factory(Project::class)->create([
            'user_id' => $user->id,
        ]);

        $tasks = factory(Task::class, 10)->create([
            'project_id' => $project->id,
            'user_id' => $user->id,
        ]);

        $this->assertCount(10, $user->tasks()->get());
        $this->assertCount(10, $project->tasks()->get());
        $this->assertEquals($user->id, $tasks->first()->user_id);
    }
}
