<?php

namespace App\Http\Controllers;

use App\Repositories\TaskRepository;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    private $task;

    public function __construct(TaskRepository $task)
    {
        $this->task = $task;
    }

    public function getAllTasks($id = null)
    {
        $tasks = $this->task->getAll();

        $editTask = (isset($id)) ? $this->task->getById($id) : null;

        return view('tasks.index', compact('tasks', 'editTask'));
    }

    public function postStoreTask(Request $request)
    {
        $attributes = $request->only([
            'description',
        ]);

        $this->task->create($attributes);

        return redirect()
            ->route('task.index');
    }

    public function postUpdateTask($id, Request $request)
    {
        $attributes = $request->only([
            'description',
        ]);

        $this->task->update($id, $attributes);

        return redirect()
            ->route('task.index');
    }

    public function postDeleteTask($id)
    {
        $this->task->delete($id);

        return redirect()
            ->route('task.index');
    }
}
