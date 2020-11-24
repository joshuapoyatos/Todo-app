<?php


namespace App\Repository\Todo;


use App\Http\Requests\FindTodoRequest;
use App\Models\Todo;

class TodoRepository implements TodoRepositoryInterface
{
    public function __construct()
    {
    }

    public function get(int $id)
    {
        return Todo::find($id);
    }

    public function find(FindTodoRequest $findTodoRequest)
    {
        $model = Todo::query();

        if ($findTodoRequest->input('title')) {
            $model->where('title', 'LIKE', `%{$findTodoRequest->input('title')}%`);
        }

        return $model->get();
    }

    public function add(Todo $todo)
    {
        $todo->save();
        return $todo;
    }

    public function update(Todo $todo)
    {
        $todo->update();
        return $todo;
    }

    public function delete(int $id)
    {
        return Todo::destroy($id);
    }
}
