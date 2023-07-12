<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class FrontendAnalysisController extends Controller
{
    public function index(){
        $users = User::all();
        $permissions = Permission::all();
        return view('frontend.analysis.index', compact('permissions', 'users'));
    }
}
