@extends('layouts.plantilla')

@section('title','Show')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
@endpush

@section('content')

<h2> Course Details</h2>
    <div class="course-details">
        <h3>{{ $course->title }}</h3>
        <p><strong>Description: </strong>{{ $course->description }}</p>
        <p><strong>Language: </strong>{{ $course->language }}</p>
        <p><strong>Difficulty: </strong>{{ $course->difficulty }}</p>
        <p><strong>Instructor: </strong>{{ $course->instructor }}</p>
        <p><strong>Email: </strong>{{ $course->email }}</p>
        <p><strong>Course Image: </strong></p>

        @if ($course->iamge_path)
        <img src="{{ asset('storage/' . $course->iamge_path) }}" alt="Course Image">
        @endif

    </div>

@endsection

@section('anotherContent','Más información de la página show')
