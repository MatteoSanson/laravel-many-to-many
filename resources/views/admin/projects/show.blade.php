@extends('layouts.admin')

@section('content')
    @if (session('message'))
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto">Notifica</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session('message') }}
                </div>
            </div>
        </div>
    @endif

    <div class="my-3">
        <h1>{{ $project->title }}</h1>
    </div>
    <div class="card">
        <div class="card-header">
            <p><strong>Visibility:</strong> {{ $project->visibility }} project</p>
        </div>
        <div class="card-body">
            <p class="card-text"><strong>Type:</strong> {{ $project->type->title }}</p>
            {{-- <p class="card-text"><strong>Language/Framework:</strong> {{ $project->language_framework }}</p> --}}
            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-primary btn-sm">Edit</a>
            <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST" class="d-inline-block">
                @csrf
                @method('DELETE')
                <input type="submit" value="Delete" class="btn btn-danger btn-sm">
            </form>
        </div>
    </div>
@endsection
