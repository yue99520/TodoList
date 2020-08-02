<?php

namespace Tests\Unit;

use App\Project;
use App\Task;
use App\User;
use Tests\TestCase;


class ProjectTest extends TestCase
{
    function testUserHasProjects()
    {
        $random = random_int(1, 10);

        $user = factory(User::class)->create();
        factory(Project::class, $random)->create([
            'user_id' => $user->id,
        ]);

        $this->assertCount($random, $user->projects);
    }

    function testProjectHasTasks()
    {
        $random = random_int(1, 10);

        $project = factory(Project::class)->create();
        factory(Task::class, $random)->create([
            'project_id' => $project->id,
        ]);

        $this->assertCount($random, $project->tasks);
    }

    function testProjectDelete()
    {
        $random = random_int(1, 10);

        $project = factory(Project::class)->create();
        factory(Task::class, $random)->create([
            'project_id' => $project->id,
        ]);

        $project->delete();
        $this->assertFalse(Project::query()->where('id', $project->id)->exists());
        $this->assertCount(0, Task::query()->where('project_id', $project->id)->get());
    }
}
