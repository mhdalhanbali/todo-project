<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class todosController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        //return view('todos.todos', ['todos' => $todos]);
        return view ('todos.index')->with('todos', $todos);
         //return view ('todos.index', compact('todos'));

    }

   public function show(Todo $todo)
   {
    //  $todo  = Todo::find($todo);
    //  return view('todos.show', compact(Todo::find($todo)));
     return view ('todos.show')->with('todo', $todo);
   }
  public function create()
  {
   return view ('todos.create',);
  }
 public function store(request $request)
 {
//  return $request->all();
// return $request->input('todoTitle');
// return $request->todoTitle;

$request->validate([
  'todoTitle' => 'required|min:6',
  'todoDescription' => 'required',

]);
$todo= new Todo();
$todo->title = $request->todoTitle;
$todo->description = $request->todoDescription;
$todo->title = $request->todoTitle;
$todo->save();
$request->session()->flash('success', 'Todo created successfully');
return redirect('/todos');
}
public function edit(Todo $todo)
{
  return view('todos.edit') ->with('todo', $todo);
}
public function update(Request $request, Todo $todo)
{
  $request->validate([
    'todoTitle' => 'required|min:6',
    'todoDescription' => 'required',
  
  ]);
$todo->title =$request-> get('todoTitle');
$todo->description = $request->get('todoDescription');
$todo->save();
$request->session()->flash('success', 'Todo updated successfully');

return redirect('/todos');
}
public function destroy(Todo $todo)
{
  $todo-> delete();
session()->flash('success', 'Todo deleted successfully');

  return redirect('/todos');
}
public function complete(Todo $todo)
{
 $todo->completed = true;
 $todo->save();
session()->flash('success', 'Todo completed successfully');
return redirect('/todos');


}
}




