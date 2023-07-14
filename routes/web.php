<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\FrontendAnalysisController;
use App\Http\Controllers\FrontendContactController;
use App\Http\Controllers\FrontendTaskController;
use App\Http\Controllers\FrontendTeamController;
use App\Http\Controllers\Invite\InvitationController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Models\Task;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Route::get('/task',[TaskController::class, 'index'])->name('task.index');
// Route::get('/task/create', [TaskController::class, 'create'])->name('task.create');
// Route::post('/task', [TaskController::class, 'store'])->name('task.store');
// Route::delete('/task/{task}', [TaskController::class, 'destroy'])->name('task.destroy');
// Route::resource('/task', TaskController::class);
// Route::post('/task/assign', [TaskController::class, 'assign'])->name('task.assign');

Route::get('/task', [TaskController::class, 'index'])->name('task.index');
Route::get('/task/create', [TaskController::class, 'create'])->name('task.create');
Route::post('/task', [TaskController::class, 'store'])->name('task.store');
Route::delete('/task/{task}', [TaskController::class, 'destroy'])->name('task.destroy');
// Route::get('/task/{task}', [TaskController::class, 'show'])->name('task.show');
Route::put('/task/{task}', [TaskController::class, 'update'])->name('task.update');
Route::patch('/task/{task}', [TaskController::class, 'update'])->name('task.update');
Route::get('/task/{task}/edit', [TaskController::class, 'edit'])->name('task.edit');
Route::get('/task/assign', [TaskController::class, 'assignTask'])->name('task.assign');
// Route::post('/task', [TaskController::class, 'assign'])->name('task.assign.user');
Route::post('/task/assign', [TaskController::class, 'assign'])->name('assign.user');
Route::get('/task/take', [TaskController::class, 'takeTask'])->name('task.take');
Route::post('/task/take', [TaskController::class, 'take'])->name('take.user');

Route::get('/task/submit/{user_id}', [TaskController::class, 'submitTask'])->name('task.submit');
Route::post('/task/submit', [TaskController::class, 'submitStore'])->name('task.submit.store');

Route::get('/front/task', [FrontendTaskController::class, 'index'])->name('front.task.index');
Route::get('/front/team', [FrontendTeamController::class, 'index'])->name('front.team.index');
Route::get('/front/pairs', [FrontendTeamController::class, 'pairs'])->name('front.team.pairs');
Route::get('/front/analysis', [FrontendAnalysisController::class, 'index'])->name('front.analysis.index');
Route::get('/front/contact', [FrontendContactController::class, 'index'])->name('front.contact.index');

Route::get('/invi/{user}', [InvitationController::class, 'index'])->name('team.invi');
Route::post('/invi/send', [InvitationController::class, 'sendInvitation'])->name('invitations.send')->middleware('web');

Route::get('/message', [MessageController::class, 'index'])->name('front.message');
Route::post('/invitation/accept/{invitation}', [MessageController::class, 'accept'])->name('invitation.accept');
Route::post('/invitation/reject/{invitation}', [MessageController::class, 'reject'])->name('invitation.reject');

// Route::resource('task', TaskController::class)->except([
//     'index', 'create', 'store', 'destroy'
// ]);
// Route::post('/task/assign', [TaskController::class, 'assign'])->name('task.assign');


// Route::get('/task/assign', [TaskController::class, 'assignTask'])->name('task.assign');
// Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function(){
//     Route::get('/', [AdminController::class, 'index'])->name('index');

// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/track-time', [App\Http\Controllers\TimeController::class, 'trackTime'])->name('track-time');

Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function(){
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('/roles', RoleController::class);
    Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions');
    Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('roles.permissions.revoke');
    Route::resource('/permissions', PermissionController::class);
    Route::post('/permissions/{permission}/roles', [PermissionController::class, 'assignRole'])->name('permissions.roles');
    Route::delete('/permissions/{permission}/roles/{role}', [PermissionController::class, 'removeRole'])->name('permissions.roles.remove');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::post('/users/{user}/roles', [UserController::class, 'assignRole'])->name('users.roles');
    Route::delete('/users/{user}/roles/{role}', [UserController::class, 'removeRole'])->name('users.roles.remove');
    Route::post('/users/{user}/permissions', [UserController::class, 'givePermission'])->name('users.permissions');
    Route::delete('/users/{user}/permissions/{permission}', [UserController::class, 'revokePermission'])->name('users.permissions.revoke');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
