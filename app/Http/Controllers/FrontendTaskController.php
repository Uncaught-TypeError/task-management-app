<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class FrontendTaskController extends Controller
{
    public function index(){
        $tasks = Task::all();
        return view('frontend.task.index', compact('tasks'));
    }
}
