@extends('layouts.plantilla')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
@endpush

@section('content')

<h2>Edit Course</h2>

<form action="{{ route('courses.update', $course->id) }}" method="post" class="edit-course-form" enctype="multipart/form-data">
    @csrf

    @method('PUT')

    <label>Title:</label>
    <input type="text" name="title" value="{{ $course->title }}">

    <label>Description:</label>
    <textarea name="description">{{ $course->description }}</textarea>

    <label>Language:</label>
    <input type="text" name="language" value="{{ $course->language }}">
    
    <label>Difficulty:</label>
    <select name="difficulty">
        <option value="Beginner" {{ $course->difficulty == 'Beginner' ? 'selected' : '' }}>Beginner</option>
        <option value="Intermediate" {{ $course->difficulty == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
        <option value="Advanced" {{ $course->difficulty == 'Advanced' ? 'selected' : '' }}>Advanced</option>
    </select>

    <label>Intructor:</label>
    <input type="text" name="instructor" value="{{ $course->instructor }}">

    <label>Email:</label>
    <input type="text" name="email" value="{{ $course->email }}">

    <label>Course Image:</label>
    <input type="file" name="image">

    <label for="image">Nueva Imagen:</label>
    <input type="file" name="image">

    <button type="submit">Actualizar</button>

</form>

@endsection

