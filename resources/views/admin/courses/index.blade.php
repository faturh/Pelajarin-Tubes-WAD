@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Courses</h1>
    <a href="{{ route('admin.courses.create') }}" class="btn btn-primary mb-3">Add Course</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">{{ $message }}</div>
    @endif
    <table class="table table-bordered">
    <thead>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Image</th>
        <th>Link</th>
        <th>Publisher</th>
        <th>Actions</th>
    </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
                <tr>
                    <td>{{ $course->CourseId }}</td>
                    <td>{{ $course->Title }}</td>
                    <td>
                        @if ($course->Image)
                            <img src="{{ asset('storage/' . $course->Image) }}" alt="Course Image" style="width: 100px;">
                        @else
                            No Image
                        @endif
                    </td>
                    <td><a href="{{ $course->Link }}" target="_blank">{{ $course->Link }}</a></td>
                    <td>{{ $course->Publisher }}</td>
                    <td>
                        <a href="{{ route('admin.courses.edit', $course) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.courses.destroy', $course) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
</div>
@endsection
