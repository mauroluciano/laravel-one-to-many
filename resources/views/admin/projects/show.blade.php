@extends('layouts.app')
@section('content')
<div class="container col-md-9">
    <a href="{{ route('admin.projects.index')}}">Torna alla lista</a>
<h2>{{$project->title}}</h2>
<p>{{$project->content}}</p>
<p class="card-text"><small class="text-muted"><strong>Date Creation: </strong> {{$project->created_at}}</small></p>
      <p class="card-text"><small class="text-muted"><strong>Last Update: </strong> {{$project->updated_at}}</small></p>
    
      <strong>Type: </strong> {{ $project->type ? $project->type->label :
        'Nessuna categoria' }}
    </div>
</div>

@endsection