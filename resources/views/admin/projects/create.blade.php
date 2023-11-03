@extends('layouts.app')
@section('content-header')
    <a href="{{ route('admin.projects.index')}}">Torna alla lista</a>
@endsection

@section('content')
<div class="container">
    <a href="{{ route('admin.projects.index')}}" class="btn btn-primary">torna alla lista</a>
    <form action="{{route('admin.projects.store')}}" method="POST" class="row g-3">
        <div class="col-12 mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" name="title" id="title" class="form-control">
        </div>
        <div class="col-12 mb-3">
            <label for="content" class="form-label">Contenuto</label>
            <textarea type="text" name="content" id="content" class="form-control"></textarea>
        </div>
        <div class="col-12 mb-3">
            <button class="btn btn-primary">
                Save
            </button>
        </div>

        <label for="project_id" class="form-label">Categoria</label>
        <select name="project_id" id="project_id" class="form-select @error('project_id') is-invalid @enderror">
          <option value="">Non categorizzato</option>
          @foreach ($types as $type)
            <option value="{{ $type->id }}" @if (old('type_id') ?? $project->type_id == $type->id) selected @endif>{{ $type->label }}
            </option>
          @endforeach
        </select>
        @error('project_id')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
    </form>
</div>
@endsection