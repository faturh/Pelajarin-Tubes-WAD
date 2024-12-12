@extends('layouts.elearn_layout')

@section('content2')
<div class="container">
    <h1>Edit E-Learning</h1>
    <form action="{{ route('admin.elearning.update', $elearn) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="Title">Title</label>
            <input type="text" name="Title" id="Title" class="form-control" value="{{ $elearn->Title }}" required>
        </div>
        <div class="form-group">
            <label for="Link">Link</label>
            <input type="url" name="Link" id="Link" class="form-control" value="{{ $elearn->Link }}" required>
        </div>
        <div class="form-group">
            <label for="Image">Image</label>
            <input type="file" name="Image" id="Image" class="form-control">
            @if ($elearn->Image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $elearn->Image) }}" alt="E-Learn Image" style="width: 150px;">
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="Publisher">Publisher</label>
            <input type="text" name="Publisher" id="Publisher" class="form-control" value="{{ $elearn->Publisher }}" required>
        </div>
        <div class="form-group">
            <label for="Description">Description</label>
            <textarea name="Description" id="Description" class="form-control">{{ $elearn->Description }}</textarea>
        </div>
        <div class="form-group">
            <label for="ended_at">Ended At</label>
            <input type="datetime-local" name="ended_at" id="ended_at" class="form-control" value="{{ $elearn->ended_at }}">
        </div>
        <button type="submit" class="btn btn-success mt-3">Update</button>
    </form>
</div>
@endsection
