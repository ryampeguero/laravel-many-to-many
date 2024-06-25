@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Dettagli Progetto</h1>
        @include('partials.message-success')
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="mb-3">
                    <h3>{{ $project->title }}</h3>
                </div>
                <div class="mb-3">
                    <h5>Tipologia: {{ $project->type?->name }}</h5>
                </div>

                <div class="mb-3">
                    <p>{{ $project->description }}</p>
                </div>

                @if ($project->image_path)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $project->image_path) }}" alt="">
                    </div>
                @endif
            </div>
            <div class="col-2"></div>
        </div>
    </div>
@endsection
