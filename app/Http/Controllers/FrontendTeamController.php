<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class FrontendTeamController extends Controller
{
    public function index(){
        $users = User::all();
        $tasks = Task::all();
        return view('frontend.team.index', compact('users', 'tasks'));
    }
}
