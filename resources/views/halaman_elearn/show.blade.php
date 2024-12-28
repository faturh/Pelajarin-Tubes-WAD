@extends('layouts.newtab_elearn')  

@section('content') 
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h1 class="card-title text-primary">{{ $elearn->Title }}</h1>

            @if ($elearn->Image)
                <div class="text-center">
                    <img src="{{ asset('storage/' . $elearn->Image) }}" alt="E-Learn Image" class="img-fluid rounded" style="max-width: 300px;">
                </div>
            @else
                <p class="text-center text-muted">No image available.</p>
            @endif

            <p class="text-muted"><strong>Publisher:</strong> {{ $elearn->Publisher }}</p>
            <p>
                <strong>Link:</strong>
                <a href="{{ $elearn->Link }}" target="_blank" class="text-decoration-none text-info">{{ $elearn->Link }}</a>
            </p>
            <p>
                <strong>Ended At:</strong>
                {{ $elearn->ended_at ? \Carbon\Carbon::parse($elearn->ended_at)->format('Y-m-d H:i') : 'No end date' }}
            </p>
            <p class="mb-4">
                <strong>Description:</strong>
                {{ $elearn->Description ?? 'No description available' }}
            </p>

            @if ($elearn->Certificate)
                <p>
                    <strong>Certificate:</strong>
                    <a href="{{ asset('storage/' . $elearn->Certificate) }}" download class="btn btn-success">
                        Download Certificate
                    </a>
                </p>
            @else
                <p class="text-muted">No certificate available.</p>
            @endif
        </div>
    </div>
</div>
@endsection
