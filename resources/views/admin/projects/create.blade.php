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

    </form>
</div>
@endsection