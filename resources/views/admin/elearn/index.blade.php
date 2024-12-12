@extends('layouts.elearn_layout')

@section('content2')
<div class="container">
    <h1>E-Learning List</h1>
    <a href="{{ route('admin.elearning.create') }}" class="btn btn-primary mb-3">Add E-Learning</a>


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
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($elearn as $elearn)
                <tr>
                    <td>{{ $elearn->ElearnId }}</td>
                    <td>{{ $elearn->Title }}</td>
                    <td>
                        @if ($elearn->Image)
                            <img src="{{ asset('storage/' . $elearn->Image) }}" alt="E-Learn Image" style="width: 100px;">
                        @else
                            No Image
                        @endif
                    </td>
                    <td><a href="{{ $elearn->Link }}" target="_blank">{{ $elearn->Link }}</a></td>
                    <td>{{ $elearn->Publisher }}</td>
                    <td>{{ $elearn->Description ?? 'No Description' }}</td>
                    <td>
                        <a href="{{ route('admin.elearning.edit', $elearn) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.elearning.destroy', $elearn) }}" method="POST" style="display:inline;">
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
