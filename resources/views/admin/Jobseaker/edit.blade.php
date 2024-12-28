@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Edit E-Learning</h1>

    <form action="{{ route('admin.jobseaker.update', $jobseaker->JobseakerId) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <div class="form-group">
            <label for="Title">Title</label>
            <input type="text" name="Title" id="Title" class="form-control" value="{{ $jobseaker->Title }}" required>
        </div>

        <div class="form-group">
            <label for="Link">Link</label>
            <input type="url" name="Link" id="Link" class="form-control" value="{{ $jobseaker->Link }}" required>
        </div>

        <div class="form-group">
            <label for="Image">Image</label>
            <input type="file" name="Image" id="Image" class="form-control">
            @if ($jobseaker->Image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $jobseaker->Image) }}" alt="Jobseaker Image" style="width: 150px;">
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="Publisher">Publisher</label>
            <input type="text" name="Publisher" id="Publisher" class="form-control" value="{{ $jobseaker->Publisher }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Jobseaker</button>
    </form>


</div>

@endsection