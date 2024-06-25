@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Projects</h1>
        <div class="row">
          
            <div class="col-8">
                @include('partials.message-success')
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Titolo</th>
                            <th scope="col">Tipologia</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projectList as $project)
                            <tr>
                                <th scope="row">{{ $project->id }}</th>
                                <td>{{ $project->title }}</td>
                                <td>{{ $project->type?->name }}</td>
                                <td>{{ $project->slug }}</td>
                                <td class="d-flex gap-3">

                                    <a class="btn btn-primary"
                                        href="{{ route('admin.projects.show', ['project' => $project->slug]) }}">
                                        Dettagli
                                    </a>
                                
                                    <a class="btn btn-warning"
                                        href="{{ route('admin.projects.edit', ['project' => $project->slug]) }}">
                                        Modifica
                                    </a>
                            
                                    <form action="{{ route('admin.projects.destroy', ['project' => $project->slug]) }}"
                                        method="POST" id="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" data-bs-toggle="modal"  data-bs-target="#exampleModal">Elimina</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{ $projectList->links() }}
    </div>
    @include('partials.modal')
@endsection
