<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index(){
        $users = User::all();
        $permissions = Permission::all();
        return view('admin.index', compact('permissions', 'users'));
    }
}
