<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Type;


class ProjectController extends Controller
{
 public function index()

 {
    $projects = Project::all();
    return view('admin.projects.index', compact('projects'));
 }

public function show(Project $project)
{
   return view('admin.projects.show', compact('project'));
}

public function create()
{
      $types = Type::all();

   return view('admin.projects.create', compact('types'));
}

public function edit(Project $project)
{
   $types = Type::all();
   return view('admin.projects.edit', compact('project', 'types' ));
}

public function destroy(Project $project)
{
   return view('admin.projects.index');
}




  public function store(Request $request)
  {

    $validated = $request->validate([
        'title' => 'required|max:50',
        'description' => 'required',
    ]);
      $data = $request->all();
   //   $this->validation($data);

      $project = new Project();
      $project->fill($data);
      $project->save();
      return redirect()->route('admin.projects.show', $project)
          // * To add flash messages
          ->with('message', 'Comic saved succesfully!')
          ->with('message_type', 'success');
  }



public function update(Request $request, Project $project)
{
    $data = $request->all();
//    $this->validation($data);
    $project->update($data);
    return redirect()->route('admin.projects.show', $project)
        // * To add flash messages
        ->with('message', 'Comic edited succesfully!')
        ->with('message_type', 'success');
}

/*public function destroy(Project $project)
{
    $project->delete();
    // * Redirect to index
    return response(redirect()->route('admin.projects.index')
        // * To add flash messages
        ->with('message', 'Post deleted succesfully!')
        ->with('message_type', 'danger'));

}*/




}
