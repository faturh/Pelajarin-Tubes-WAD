@extends('layouts.elearn_layout')

@section('content2')
<div class="container">
    <h1>Create New E-Learn</h1>
    <form action="{{ route('admin.elearning.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="Title">Title</label>
            <input type="text" name="Title" id="Title" class="form-control" placeholder="Enter course title" required>
        </div>
        <div class="form-group">
            <label for="Link">Link</label>
            <input type="url" name="Link" id="Link" class="form-control" placeholder="Enter course link" required>
        </div>
        <div class="form-group">
            <label for="Image">Image</label>
            <input type="file" name="Image" id="Image" class="form-control">
        </div>
        <div class="form-group">
            <label for="Publisher">Publisher</label>
            <input type="text" name="Publisher" id="Publisher" class="form-control" placeholder="Enter publisher name" required>
        </div>
        <div class="form-group">
            <label for="Description">Description</label>
            <textarea name="Description" id="Description" class="form-control" placeholder="Enter course description"></textarea>
        </div>
        <div class="form-group">
            <label for="ended_at">Ended At</label>
            <input type="datetime-local" name="ended_at" id="ended_at" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Create</button>
    </form>
</div>
@endsection
