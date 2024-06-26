@extends('layouts.admin')

@section('content')
    <div class="container">
        @include('partials.errors')
        <h1>Edita</h1>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <form action="{{ route('admin.projects.update', ['project' => $project->slug]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input type="text" class="form-control" id="title" name="title"
                            value="{{ old('title', $project->title) }}">
                    </div>
                    <div class="mb-3">
                        <select class="form-select" name="type_id" id="type_id">
                            <option value="">Seleziona</option>
                            @foreach ($types as $type)
                                <option @selected($project->type_id == $type->id) value="{{ $type->id }}">{{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <div class="btn-group" role="group">

                            @if (old('technologies') !== null)
                                @foreach ($technologies as $technology)
                                    <input @checked(in_array($technology->id, old('technologies', []))) name="technologies[]" type="checkbox"
                                        class="btn-check" id="technology-{{ $technology->id }}"
                                        value="{{ $technology->id }}">
                                    <label class="btn btn-outline-primary"
                                        for="technology-{{ $technology->id }}">{{ $technology->name }}</label>
                                @endforeach
                            @else
                                @foreach ($technologies as $technology)
                                    <input @checked($project->technologies->contains($technology->id)) name="technologies[]" type="checkbox"
                                        class="btn-check" id="technology-{{ $technology->id }}"
                                        value="{{ $technology->id }}">
                                    <label class="btn btn-outline-primary"
                                        for="technology-{{ $technology->id }}">{{ $technology->name }}</label>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="image">Carica immagine</label>
                        <input class="form-control" type="file" name="image" id="image">
                    </div>

                    <div class="mb-3">
                        <h5>Preview immagine</h5>
                        <div id="preview">
                            <img src="{{ asset('storage/' . $project->image_path) }}" alt="">
                        </div>
                        <button class="btn btn-success" id="show-preview">Mostra preview</button>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione</label>
                        <input type="text" class="form-control" id="description" name="description"
                            value="{{ old('description', $project->description) }}">
                        <input type="hidden" name="slug">

                    </div>
                    <button type="submit" class="btn btn-primary">Salva</button>
                </form>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
@endsection
