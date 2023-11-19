<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\homeController;

use App\Http\Controllers\courseController;

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
    return view('home');
});

// ---------------------------------------------------------------------------

//http://localhost/actividad7/public/courses
// Route::get('/courses', function () {
//     return ("Welcome to the courses.");
// });

//http://localhost/actividad7/public/courses/Infraestructura
// Route::get('/courses/{course}', function ($course) {
//     return ("Welcome to the course: $course.");
// });

//http://localhost/actividad7/public/courses/Infraestructura/Data
// Route::get('/courses/{course}/{category}', function ($course, $category) {
//     return ("Welcome to the course: $course, of the category: $category. ");
// });

// ---------------------------------------------------------------------------

// Route::get('/create', function () {
//     return view('create');
// });

// Route::get('/show', function () {
//     return view('show');
// });

//----------------------------------------------------------------------------

//localhost/Actividad7/public/courses
Route::get('/courses', [courseController::class, 'index'])->name('courses.index');

//Create
//localhost/Actividad7/public/courses/create
Route::get('/courses/create', [courseController::class, 'create'])->name('courses.create');

//Store
Route::post('/courses', [courseController::class, 'store'])->name('courses.store');

// Show
route::get('/courses/{id}', [courseController::class, 'show'])->name('courses.show');

// Edit
route::get('/courses/{id}/edit', [courseController::class, 'edit'])->name('courses.edit');

// Update
route::put('/courses/{id}', [courseController::class, 'update'])->name('courses.update');

// Delete
route::delete('/courses/{id}', [courseController::class, 'destroy'])->name('courses.destroy');