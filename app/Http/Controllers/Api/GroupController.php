<?php

namespace App\Http\Controllers\Api;

use App\Group;
use App\Http\Controllers\Controller;

class GroupController extends Controller
{
    function get($id)
    {
        if (is_int($id)) {
            $group = Group::query()->findOrFail($id);
        } else {
            $group = Group::query()->where('title', $id)->firstOrFail();
        }

        $users = collect($group->users);
        $userKeys = collect();
        $users->each(function ($item, $key) use ($userKeys) {
            $userKeys->add($item->id);
        });

        return response()->json([
            'info' => [
                'size' => $users->count(),
            ],
            'data' => $userKeys->toJson(),
        ]);
    }
}
