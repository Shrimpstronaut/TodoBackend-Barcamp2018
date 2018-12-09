<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

/**
 * This controller handles all task related http requests.
 *
 * @package App\Http\Controllers
 */
class TodoController extends Controller
{
    /**
     * Return all existing tasks.
     *
     * @return Todo[]|\Illuminate\Database\Eloquent\Collection
     */
    public function findAll()
    {
        return Todo::all();
    }

    /**
     * Return a single existing task with given id.
     *
     * @param $taskId
     * @return mixed
     */
    public function findOne($taskId)
    {
        return Todo::find($taskId);
    }

    /**
     * Persist new task from given request object.
     *
     * @param Request $request
     * @return Todo
     */
    public function store(Request $request)
    {
        $todo = new Todo;

        $todo->title = $request->title;

        $todo->save();

        return $todo;
    }

    /**
     * Remove existing task with given id from request.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function remove($id)
    {
        $todo = Todo::find($id);

        if ($todo) {
            $todo->delete();

            return response()->json(array('success' => true), 200);
        }

        return response()->json(array('success' => false), 400);
    }

    /**
     * Update given request from request.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        $todo = Todo::find($request->id);

        if ($todo) {
            $todo->title = $request->title;

            return $todo->save();
        }

        return response()->json(array('success' => false), 400);
    }
}
