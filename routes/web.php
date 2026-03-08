<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.layoutpublic');
})->name('home');

Route::get('/admin', function () {
    return view('layouts.layoutadmin');
})->name('admin');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');

    // project settings routes (auth-only)
    Route::redirect('settings', 'settings/profile');
});

// Projects resource (available without auth for the assignments/tests)
Route::resource('admin/projects', \App\Http\Controllers\Admin\ProjectController::class)->names('projects')->middleware('auth.forbid');
Route::get('admin/projects/{project}/delete', [\App\Http\Controllers\Admin\ProjectController::class, 'delete'])->name('projects.delete')->middleware('auth.forbid');

// Tasks resource (available without auth for the assignments/tests)
Route::resource('admin/tasks', \App\Http\Controllers\Admin\TaskController::class)->names('tasks')->middleware('auth.forbid');
Route::get('admin/tasks/{task}/delete', [\App\Http\Controllers\Admin\TaskController::class, 'delete'])->name('tasks.delete')->middleware('auth.forbid');

// Public projects listing
Route::get('/projects', [\App\Http\Controllers\OpenProjectController::class, 'index'])->name('open.projects.index');

require __DIR__.'/auth.php';
