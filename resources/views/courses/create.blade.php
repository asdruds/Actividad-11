@extends('layouts.plantilla')

@section('title','Create')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
@endpush

<h2>Add new course</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form class="course-form" action="{{ route('courses.store') }}" method="post" enctype="multipart/form-data">

@csrf

<label for="title">Title:</label>
<input type="text" id="title" name="title">
@error('title')
        <div class="alert alert-danger">{{ $message }}</div>
@enderror

<label for="description">Description:</label>
<textarea id="description" name="description"></textarea>
@error('description')
        <div class="alert alert-danger">{{ $message }}</div>
@enderror

<label for="language">Language:</label>
<input type="text" id="language" name="language">
@error('language')
        <div class="alert alert-danger">{{ $message }}</div>
@enderror

<label for="difficulty">Difficulty:</label>
<select id="difficulty" name="difficulty">
        <option value="Beginner">Beginner</option>
        <option value="Intermediate">Intermediante</option>
        <option value="Advanced">Advanced</option>
</select>
@error('difficulty')
        <div class="alert alert-danger">{{ $message }}</div>
@enderror

<label for="instructor">Instructor:</label>
<input type="text" id="instructor" name="instructor">
@error('instructor')
        <div class="alert alert-danger">{{ $message }}</div>
@enderror

<label for="email">Email:</label>
<input type="text" id="email" name="email">
@error('email')
        <div class="alert alert-danger">{{ $message }}</div>
@enderror

<label for="image">Image:</label>
<input type="file" id="image" name="image">
@error('image')
        <div class="alert alert-danger">{{ $message }}</div>
@enderror

<input type="submit" value="Add Course">

</form>

@section('anotherContent','Más información de la página create')

