<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function findAll()
    {
        return Todo::all();
    }

    public function store(Request $request)
    {
        $todo = new Todo;

        $todo->title = $request->title;

        $todo->save();

        return $todo;
    }

    public function remove(Request $request)
    {
        $todo = Todo::find($request->id);

        if($todo) {
            $todo->delete();

            return response()->json(array('success' => true), 200);
        }

        return response()->json(array('success' => false), 400);
    }
}
