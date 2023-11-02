@extends('layouts.app')
@section('content')

<div class='container'>
    <a href="{{route('admin.projects.create')}}" class="btn btn-primary">Crea uno nuovo</a>
@foreach ($projects as $project)
    <table class="table table-bordered table-striped m-3">
        <thead>
            <tr>
              <th scope="col">Titolo</th>
              <th scope="col">Contenuto</th>
              <th scope="col">Opzioni</th>

            </tr>
        </thead>
        <tbody>
        <td>{{$project->title}}</td>
        <td>{{$project->content}}</td> 
        <td><span><a href="{{route('admin.projects.show', $project)}}">Dettagli</a></span>
            <span><a href="{{route('admin.projects.edit', $project)}}">Modifica</a></span>
            <a href="#" data-bs-toggle="modal" data-bs-target="#delete-modal-{{$project->id}}" class="mx-1">
                Cancella  
              </a>
            <div class="modal fade" id="delete-modal-{{$project->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Cancella post</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Sei sicuro? <br>
                      Vuoi cancellare "{{$project->title}}"? <br>
                      E se poi te ne penti?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                      
                      <form action="{{route('admin.projects.destroy', $project)}}" method="POST" class="mx-1">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger">
                      Fatto
                      </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

        </td>



    </tr>



</tbody>
</table> 
    @endforeach
</div>

<div>
  <table class="table">
    <thead>
      <tr>

        <th scope="col">Type</th>

      </tr>
    </thead>
    <tbody>
      @forelse($projects as $project)
      <tr>

        <td>{{ $project->type?->label }}</td>

      </tr>
      @empty
      <tr>
        <td colspan="n">Nessun risultato</td>
      </tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection