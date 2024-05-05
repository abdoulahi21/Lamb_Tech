<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\SchoolClass;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Task::class, 'task');
    }

    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $teachers = User::where('role', 'professeur')->get();
        $teachers = $teachers->map(function ($teacher) {
            return [
                'id' => $teacher->profile->id,
                'name' => $teacher->profile->name,
            ];
        });
        $schoolClasses = SchoolClass::all();
//        dd($teachers);
        return view('tasks.form',
        [
            'teachers' => $teachers,
            'schoolClasses' => $schoolClasses

        ]);
    }

    public function store(Request $request)
    {
        Task::create($request->all());

        return redirect()->route('tasks.index')
            ->with('success', 'Task created successfully.');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $task->update($request->all());

        return redirect()->route('tasks.index')
            ->with('success', 'Task updated successfully');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')
            ->with('success', 'Task deleted successfully');
    }
}
