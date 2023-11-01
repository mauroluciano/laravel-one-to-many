@extends('layouts.app')

@section('content')
<div class='container'>
    {{-- Buttons to navigate --}}
    <a href="{{route('admin.projects.index')}}" class="btn btn-primary">Torna alla lista</a>
    <a href="{{route('admin.projects.show', $project)}}" class="btn btn-success">Torna i dettagli</a>

  <h1>Modifica contenuto</h1>
    {{-- * Conditions to display errors --}}
    @if($errors->any())
    <h2>Correct following errors:</h2>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>  
        @endforeach
    </ul>
    @endif


    <form action="{{route('admin.projects.update', $project)}}" method="POST" class="row g-3">
        {{-- Token --}}
        @csrf
        {{-- Method to use instead POST --}}
        @method('PUT')
        <div class="col-4">
            <label for="title">Titolo</label>
            <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{old('title') ?? $project->title}}">
            {{-- * For printing errors --}}
            @error('title')
    	    <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="col-4">
            <label for="content">Contenuto</label>
            <input type="text" id="content" name="content" class="form-control @error('content') is-invalid @enderror" value="{{ old('series') ?? $project->content}}">
            @error('content')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div>
            <button class="btn btn-danger">Salva</button>
        </div>
    </form>
</div> 
@endsection