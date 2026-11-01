<?php

use App\Http\Controllers\AdminProjectController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('page.home');
});

Route::get('/profile', [MahasiswaController::class, 'index']);
Route::get('/project', [ProjectController::class, 'index'])->name('project.index');
Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/project/{id}', [ProjectController::class, 'show'])->name('project.show');

Route::get('/about', function () {
    return view('page.about');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        $totalProjects = \App\Models\Project::count();
        $selesaiProjects = \App\Models\Project::where('status', 'Selesai')->count();
        $inProgressProjects = \App\Models\Project::where('status', '!=', 'Selesai')->count();

        return view('admin.home', compact('totalProjects', 'selesaiProjects', 'inProgressProjects'));
    })->name('home');

    Route::resource('project', AdminProjectController::class);
});
