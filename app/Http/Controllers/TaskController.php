<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Profile;
use App\Models\SchoolClass;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Task::class, 'task');
    }
    private function extractData (Task $task, TaskRequest $request) {
        $data = $request->validated();
        $exoFile = $request->validated('exo_file');
        if ($exoFile === null || $exoFile->getError()) {
            $data['exo_file'] = $task->exo_file;
            return $data;
        }
        if ($task->exo_file !== null) {
            Storage::disk('public')->delete($task->exo_file);
        }
        $data['exo_file'] = $exoFile->store('users', 'public');
        return $data;
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

    public function store(TaskRequest $request)
    {
        $data = $this->extractData(new Task(), $request);
        Task::create($data);

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

        return redirect()->route('manager.task.index')
            ->with('success', 'Task updated successfully');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('manager.task.index')
            ->with('success', 'Task deleted successfully');
    }
}
