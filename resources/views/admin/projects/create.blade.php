@extends('layouts.admin')

@section('content')
    <div class="container">
        @include('partials.errors')
        <h1>Crea nuovo progetto</h1>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="type_id">Tipologia</label>
                        <select class="form-select" name="type_id" id="type_id">
                            <option value="">Seleziona</option>
                            @foreach ($types as $type)
                                <option @selected(old('type_id') === $type->id) value="{{ $type->id }}">{{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <div class="btn-group" role="group">
                            @foreach ($technologies as $technology)
                                <input @checked(in_array($technology->id, old('technologies', []))) name="technologies[]" type="checkbox" class="btn-check" id="technology-{{$technology->id}}" value="{{$technology->id}}">
                                <label class="btn btn-outline-primary" for="technology-{{$technology->id}}">{{$technology->name}}</label>
                            @endforeach
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="image">Carica immagine</label>
                        <input class="form-control" type="file" name="image" id="image">
                    </div>


                    <div class="mb-3">
                        <h5>Preview immagine</h5>
                        <div id="preview">

                        </div>
                        <button class="btn btn-success" id="show-preview">Mostra preview</button>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione</label>
                        <input type="text" class="form-control" id="description" name="description">
                        <input type="hidden" name="slug">
                    </div>
                    <button type="submit" class="btn btn-primary">Salva</button>
                </form>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
@endsection
