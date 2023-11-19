<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Storage;

class courseController extends Controller
{
    public function index(){

        $courses = Course::all(); //SQL: SELECT * FROM Courses;
        return view("courses.index", ['courses' => $courses]);
    }

    public function create(){

        return view("courses.create");
    }

    public function store(Request $request){

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'language' => 'required|max:100',
            'difficulty' => 'required',
            'instructor' => 'required|max:100',
            'email' => 'required|email',
            'image' => 'required|image',
            'email_verified_at' => 'nullable|date',
        ]);

        $course = new Course;
        $course->title = $request->title;
        $course->description = $request->description;
        $course->language = $request->language;
        $course->difficulty = $request->difficulty;
        $course->instructor = $request->instructor;
        $course->email = $request->email;

        if ($request->hasFile('image')) {
            
            if ($course->iamge_path) {
                Storage::delete($course->iamge_path);
            }
    
            
            $imagePath = $request->file('image')->store('course_images', 'public');
            $course->iamge_path = $imagePath;

        $course->email_verified_at = $request->email_verified_at;

        $course->save(); //SQL: INSERT INTO courses (...) VALUES (...);
        return redirect()->route('courses.index')->with('success', 'Curso actualizado con éxito');
        
        }
    }
    
    public function show($id)
    {
        $course = Course::find($id);

        return view("courses.show", compact('course'));
    }

    public function edit($id)
    {
        $course = Course::find($id);

        return view('courses.edit', ['course' => $course]);    
    }

    public function update(Request $request, $id)
    {
        $course = Course::find($id);

    
        $course->title = $request->input('title');
        $course->description = $request->input('description');
        $course->language = $request->input('language');
        $course->difficulty = $request->input('difficulty');
        $course->instructor = $request->input('instructor');
        $course->email = $request->input('email');

   
        if ($request->hasFile('image')) {
        
            if ($course->iamge_path) {
             Storage::delete($course->iamge_path);
            }

            $imagePath = $request->file('image')->store('course_images', 'public');
            $course->iamge_path = $imagePath;
        }

        $course->save();

        return redirect()->route('courses.index')->with('success', 'Curso actualizado con éxito');
   
    }

    public function destroy($id)
    {
        $course = Course::find($id);
        
        $course->destroy();
        return redirect()->route('courses.index');   
    }
}
