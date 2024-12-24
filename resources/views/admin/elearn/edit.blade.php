@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Edit E-Learning</h1>

    <form action="{{ route('admin.elearning.update', $elearn->ElearnId) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf

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

        <button type="submit" class="btn btn-primary">Update E-Learning</button>
    </form>


</div>

@endsection