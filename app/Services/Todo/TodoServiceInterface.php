<?php


namespace App\Services\Todo;


use App\Http\Requests\AddTodoRequest;
use App\Http\Requests\FindTodoRequest;
use App\Http\Requests\ReorderTodoRequest;
use App\Http\Requests\UpdateTodoRequest;

interface TodoServiceInterface
{
    public function get(int $id);

    public function find(FindTodoRequest $findTodoRequest);

    public function add(AddTodoRequest $addTodoRequest);

    public function update(int $id, UpdateTodoRequest $updateTodoRequest);

    public function delete(int $id);

    public function reorder(ReorderTodoRequest $reorderTodoRequest);

}
