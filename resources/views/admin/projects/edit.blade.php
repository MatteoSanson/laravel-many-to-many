@extends('layouts.admin')

@section('content')
    <div class="my-3">
        <h1>Aggiorna info di {{ $project->title }}</h1>
    </div>
    <div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.projects.update', ['project' => $project->slug]) }}" method="POST">
            @csrf

            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                    value="{{ old('title', $project->title) }}">
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Type</label>
                <select class="form-select" aria-label="Default select example" name="type_id">
                    <option selected>Choose an option</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" @if (old('type_id', $project->type_id) == $type->id) selected @endif>
                            {{ $type->title }}</option>
                    @endforeach
                </select>
            </div>
            {{-- <div class="mb-3">
                <label class="form-label">Language/Framework</label>
                <input type="text" class="form-control @error('language_framework') is-invalid @enderror"
                    name="language_framework" value="{{ old('language_framework', $project->language_framework) }}">
                @error('language_framework')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div> --}}
            <div class="mb-3">
                <label class="form-label">Visibility</label>
                <select class="form-select" aria-label="Default select example" name="visibility">
                    <option value="public" {{ old('visibility') == 'public' ? 'selected' : '' }}>public</option>
                    <option value="private" {{ old('visibility') == 'private' ? 'selected' : '' }}>private</option>
                </select>
            </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
@endsection
