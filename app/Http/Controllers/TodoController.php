<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Todo::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TodoRequest $request)
    {
        $todo = Todo::create($request->all());

        // Trigger notification event
        event(new \App\Events\TodoCreated($todo));

        return response()->json($todo, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Todo::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TodoRequest $request, $id)
    {
        $todo = Todo::findOrFail($id);
        $todo->update($request->all());

        // Trigger notification event
        event(new \App\Events\TodoUpdated($todo));

        return response()->json($todo, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();

        // Trigger notification event
        event(new \App\Events\TodoDeleted($todo));

        return response()->json(null, 204);
    }
}
