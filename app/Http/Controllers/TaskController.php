<?php

namespace App\Http\Controllers;

use App\Models\Task as ModelsTask;
use App\Models\User;
use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;

class TaskController extends Controller
{
    public function index(){
        $tasks = ModelsTask::all();
        // $taskusers = ModelsTask::with('users')->get();
        // dd(session()->all());
        return view('task.index', compact('tasks'));
    }

    public function create(){
        if (auth()->user()->hasPermissionTo('Create Task')) {
            return view('task.create');
        } else {
            return back()->with('message', 'You are not authorized to create tasks!');
        }
    }
    public function store(Request $request){
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        if (auth()->user()->hasPermissionTo('Create Task')) {
            ModelsTask::create($validated);
            return redirect()->route('task.index')->with('message', 'Task Created.');

        } else {
            return redirect()->route('task.index')->with('message', 'You are not authorized to create tasks.');
        }
    }
    public function destroy(ModelsTask $task){
        if (auth()->user()->hasPermissionTo('Delete Task')) {
            $task->delete();
            return back()->with('message', 'Task deleted!');
        } else {
            return back()->with('message', 'You are not authorized to delete tasks!');
        }
    }

    public function edit(ModelsTask $task){
        if (auth()->user()->hasPermissionTo('Edit Task')) {
            $users = User::all();
            return view('task.edit', compact('task', 'users'));
        } else {
            return back()->with('message', 'You are not authorized to edit tasks!');
        }
    }
    public function update(Request $request, ModelsTask $task){
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);
        // dd($validated);

        if (auth()->user()->hasPermissionTo('Edit Task')) {
            $task->update($validated);
            return to_route('task.index')->with('message', 'Task Updated.');

        } else {
            return redirect()->route('task.index')->with('message', 'You are not authorized to edit tasks.');
        }
    }
    public function assignTask(){
        if (auth()->user()->hasPermissionTo('Assign Task')) {
            $tasks = ModelsTask::all();
            $users = User::all();
            return view('task.assign-task', compact('tasks', 'users'));
        } else {
            return back()->with('message', 'You are not authorized to assign tasks!');
        }
    }
    public function assign(Request $request)
    {
        $validated = $request->validate([
            'task_id' => 'required|exists:tasks,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $task = ModelsTask::findOrFail($validated['task_id']);
        $user = User::findOrFail($validated['user_id']);

        $task->user_id = $user->id;
        $task->save();

        return redirect()->route('task.index')->with('message', 'Task assigned successfully.');
    }
    public function takeTask(){
            $tasks = ModelsTask::all();
            return view('task.take-task', compact('tasks'));
    }

    public function take(Request $request){
        $validated = $request->validate([
            'task_id' => 'required|exists:tasks,id',
        ]);

        $task = ModelsTask::findOrFail($validated['task_id']);
        $user_id = auth()->user()->id;

        $task->user_id = $user_id;
        $task->save();

        return redirect()->route('task.index')->with('message', 'Task assigned successfully.');
    }

}
