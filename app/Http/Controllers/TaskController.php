<?php

namespace App\Http\Controllers;

use App\Models\Task as ModelsTask;
use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        $tasks = ModelsTask::all();
        return view('task.index', compact('tasks'));
    }

    public function create(){
        return view('task.create');
    }
    public function store(Request $request){
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);
        ModelsTask::create($validated);
        return redirect()->route('task.index')->with('message', 'Task Created.');
        
    }
}
