@extends('layouts.plantilla')

@section('title','Index')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
@endpush

@section('content')

        <h1>Este es el Index</h1>
        <h3>Esto es lo que mandó el controlador: </h3>
        
        {{$courses}}

        <p></p>
        

@endsection

<div>
        <a class=" add-course-button" href="{{ route('courses.create') }}">Add new course</a>

        @foreach ($courses as $course) 
        <ul>
                <li>{{ $course -> title }}</li>
                <li>{{ $course -> description }}</li>
                <li>{{ $course -> language }}</li>
                <li>{{ $course -> difficulty }}</li>
                <li>{{ $course -> instructor }}</li>
                <li> {{ $course -> email }}</li>
                <li>

                        @if($course->iamge_path)
                        <img class="course-image" src="{{ asset('storage/' . $course->iamge_path) }}" alt="Course Image">
                        @endif

                </li>
                
        </ul>

        <tr>
        <td class="actions-cell">

                <a class="view-course-button" href="{{ route('courses.show', $course->id) }}">View Course</a>

                <a class="edit-course-button" href="{{ route('courses.edit', $course->id) }}">Edit Course</a>

                <form class="delete-form" action="{{ route('courses.destroy', $course->id) }}">
                @method('DELETE')
                @csrf
                <button type="Submit" class="destroy-button">Delete</button>
                </form>
        </td>
        </tr>

        @endforeach
</div>

