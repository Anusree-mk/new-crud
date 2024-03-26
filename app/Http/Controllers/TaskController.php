<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index() : View
    {

        return view('tasks.index',[
            'tasks'=>Task::latest()->paginate(4)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('tasks.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request) : RedirectResponse
    {
        Task::create($request->post());
        return redirect()->route('tasks.index')
                ->withSuccess('new task added');
    }

    /**
     * Display the specified resource.
    **/
    public function show(Task $task) : View

    {
        return view('tasks.show',[

            'task' => $task
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task) : View
    {
        return view('tasks.edit',compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task) : RedirectResponse
    {
        $task->update($request->all());
        return redirect()->back()
                ->withSuccess('task is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task) : RedirectResponse
    {
        $task->delete();
        return redirect()->route('tasks.index')
                ->withSuccess('task is deleted successfully.');
    }
}
