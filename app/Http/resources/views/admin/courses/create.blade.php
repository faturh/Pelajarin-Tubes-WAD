@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Course</h1>
    <form action="{{ route('admin.courses.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="Title">Title</label>
            <input type="text" name="Title" id="Title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="Link">Link</label>
            <input type="url" name="Link" id="Link" class="form-control" required>
        
        </div>
            <div class="form-group">
            <label for="Image">Image</label>
            <input type="file" name="Image" id="Image" class="form-control">
        </div>
    

        <div class="form-group">
            <label for="Publisher">Publisher</label>
            <input type="text" name="Publisher" id="Publisher" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="Description">Description</label>
            <textarea name="Description" id="Description" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
