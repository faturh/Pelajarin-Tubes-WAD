@extends('layouts.newtab_jobseaker')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h1 class="card-title text-primary">{{ $jobseaker->Title }}</h1>

            @if ($jobseaker->Image)
                <div class="text-center">
                    <img src="{{ asset('storage/' . $jobseaker->Image) }}" alt="E-Learn Image" class="img-fluid rounded" style="max-width: 300px;">
                </div>
            @else
                <p class="text-center text-muted">No image available.</p>
            @endif

            <p class="text-muted"><strong>Publisher:</strong> {{ $jobseaker->Publisher }}</p>
            <p>
                <strong>Link:</strong> 
                <a href="{{ $jobseaker->Link }}" target="_blank" class="text-decoration-none text-info">{{ $jobseaker->Link }}</a>
            </p>
            <p>
                <strong>Ended At:</strong> 
                {{ $jobseaker->ended_at ? \Carbon\Carbon::parse($jobseaker->ended_at)->format('Y-m-d H:i') : 'No end date' }}
            </p>
            <p class="mb-4">
                <strong>Description:</strong> 
                {{ $jobseaker->Description ?? 'No description available' }}
            </p>
           
        </div>
    </div>
</div>
@endsection