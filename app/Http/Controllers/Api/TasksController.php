<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TasksRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function create(TasksRequest $request)
    {
        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status ?? 'in proccess'
        ]);

        return response()->json([
            'status' => 'Задача успешно создана',
            'data' => $task
        ]);
    }

    public function list()
    {
        $task = Task::orderBy('created_at', 'desc')->get();
        return response()->json([
            'status' => 'success',
            'data' => $task
        ]);
    }

    public function show($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Задачи не найдено!'
            ], 404);
        }
        return response()->json([
            'status' => 'success',
            'data' => $task
        ], 200);
    }

    public function update(Task $task, TasksRequest $request)
    {
        $task->update($request->only(['name', 'description', 'status']));

        return response()->json([
            'status' => 'success',
            'data' => $task
        ]);
    }

    public function delete(Task $task)
    {
        $task->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Задача успешно удалена'
        ]);
    }
}
