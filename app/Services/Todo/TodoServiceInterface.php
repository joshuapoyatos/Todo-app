<?php


namespace App\Services\Todo;


use App\Http\Requests\AddTodoRequest;
use App\Http\Requests\FindTodoRequest;
use App\Http\Requests\ReorderTodoRequest;
use App\Http\Requests\UpdateTodoRequest;

interface TodoServiceInterface
{
    /**
     * @param int $id
     * @return mixed
     */
    public function get(int $id);

    /**
     * @param FindTodoRequest $findTodoRequest
     * @return mixed
     */
    public function find(FindTodoRequest $findTodoRequest);

    /**
     * @param AddTodoRequest $addTodoRequest
     * @return mixed
     */
    public function add(AddTodoRequest $addTodoRequest);

    /**
     * @param int $id
     * @param UpdateTodoRequest $updateTodoRequest
     * @return mixed
     */
    public function update(int $id, UpdateTodoRequest $updateTodoRequest);

    /**
     * @param int $id
     * @return mixed
     */
    public function delete(int $id);

    /**
     * @param ReorderTodoRequest $reorderTodoRequest
     * @return mixed
     */
    public function reorder(ReorderTodoRequest $reorderTodoRequest);

}
