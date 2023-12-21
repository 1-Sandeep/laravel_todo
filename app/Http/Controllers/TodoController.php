<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Exception;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::latest()->paginate(20);
        return view('index', [
            'todos' => $todos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TodoRequest $request)
    {
        $validated_data = $request->validated();
        $newTodo = Todo::create($validated_data);
        return redirect()->route('todos.show', $newTodo->id)->with('warning', 'New todo added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $todo = Todo::findOrFail($id);
        return view('show', [
            'todo' => $todo,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $todo = Todo::findOrFail($id);
        return view('edit', [
            'todo' => $todo,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TodoRequest $request, string $id)
    {
        $validated_data = $request->validated();
        $todo = Todo::findOrFail($id);
        $todo->update($validated_data);
        return redirect()->route('todos.show', $todo->id)->with('success', 'Todo updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $todo = Todo::findOrFail($id)->delete();
        try {

            if ($todo) {
                return redirect()->route('todos.index')->with('success', 'deleted successfuly');
            } else {
                return redirect()->route('todos.show', $todo->id)->with('error', 'delete operation unsuccessful');
            }
        } catch (Exception $error) {
            dd($error);
        }
    }
}
