@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Course</h1>
    <form action="{{ route('admin.courses.update', $course) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="Title">Title</label>
            <input type="text" name="Title" id="Title" class="form-control" value="{{ $course->Title }}" required>
        </div>
        <div class="form-group">
            <label for="Link">Link</label>
            <input type="url" name="Link" id="Link" class="form-control" value="{{ $course->Link }}" required>
        </div>

        <div class="form-group">
            <label for="Image">Image</label>
            <input type="file" name="Image" id="Image" class="form-control">
            @if ($course->Image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $course->Image) }}" alt="Course Image" style="width: 150px;">
                </div>
            @endif
        </div>


        <div class="form-group">
            <label for="Publisher">Publisher</label>
            <input type="text" name="Publisher" id="Publisher" class="form-control" value="{{ $course->Publisher }}" required>
        </div>
        <div class="form-group">
            <label for="Description">Description</label>
            <textarea name="Description" id="Description" class="form-control">{{ $course->Description }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
