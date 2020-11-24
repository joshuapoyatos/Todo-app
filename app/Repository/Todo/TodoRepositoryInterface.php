<?php


namespace App\Repository\Todo;

use App\Http\Requests\FindTodoRequest;
use App\Models\Todo;

interface TodoRepositoryInterface
{
    public function get(int $id);

    public function find(FindTodoRequest $findTodoRequest);

    public function add(Todo $todo);

    public function update(Todo $todo);

    public function delete(int $id);
}
