<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class todosController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('todos.index', ['todos' => $todos]);
        // return view('todos')->with('todos', $todos);
        // return view('todos', compact('todos'));
    }
    public function show(Todo $todo)
    {
        return view('todos.show')->with('todo', $todo);
    }
    public function create()
    {
        return view('todos.create');
    }
    public function store(Request $request)
    {

        $request->validate([
            'todoTitle' => 'required|min:5',
            'todoDescription' => 'required'
        ]);

        $todo = new Todo();
        $todo->title = $request->todoTitle;
        $todo->description = $request->input('todoDescription');

        $todo->save();
        $request->session()->flash('primary', 'Todo created successfully');
        return redirect('/todos');
    }
    public function edit(Todo $todo)
    {
        return view('todos.edit')->with('todo', $todo);
    }
    public function update(Request $request, Todo $todo)
    {
        $request->validate([
            'todoTitle' => 'required|min:5',
            'todoDescription' => 'required'
        ]);
        $todo->title = $request->get('todoTitle');
        $todo->description = $request->input('todoDescription');

        $todo->save();
        $request->session()->flash('success', 'Todo updated succsesfully');
        return redirect('/todos');
    }
    public function destroy(Todo $todo)
    {
        $todo->delete();
        session()->flash('warning', 'Todo deleted succsesfully');
        return redirect('/todos');
    }
    public function complete(Todo $todo)
    {
        $todo->completed = true;
        $todo->save();
        session()->flash('success', 'Todo completed succsesfully');
        return redirect('/todos');
    }
}
