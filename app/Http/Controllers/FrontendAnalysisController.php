<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class FrontendAnalysisController extends Controller
{
    public function index(){
        $users = User::all();
        $permissions = Permission::all();

        $tasks = Task::all();

        return view('frontend.analysis.index', compact('tasks', 'permissions', 'users'));
    }
}
