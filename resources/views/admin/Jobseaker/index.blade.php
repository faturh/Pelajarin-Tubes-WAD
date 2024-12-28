@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Jobseaker List</h1>
    <a href="{{ route('admin.jobseaker.create') }}" class="btn btn-primary mb-3">Add Jobseaker</a>


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
            @foreach ($jobseaker as $jobseaker)
                <tr>
                    <td>{{ $jobseaker->JobseakerId }}</td>
                    <td>{{ $jobseaker->Title }}</td>
                    <td>
                        @if ($jobseaker->Image)
                            <img src="{{ asset('storage/' . $jobseaker->Image) }}" alt="Jobseaker Image" style="width: 100px;">
                        @else
                            No Image
                        @endif
                    </td>
                    <td><a href="{{ $jobseaker->Link }}" target="_blank">{{ $jobseaker->Link }}</a></td>
                    <td>{{ $jobseaker->Publisher }}</td>
                    <td>{{ $jobseaker->Description ?? 'No Description' }}</td>
                    <td>
                        <a href="{{ route('admin.jobseaker.edit', $jobseaker) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.jobseaker.destroy', $jobseaker->JobseakerId) }}" method="POST" style="display:inline;">
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
