<?php


namespace App\Services\Todo;


use App\Http\Requests\AddTodoRequest;
use App\Http\Requests\FindTodoRequest;
use App\Http\Requests\ReorderTodoRequest;
use App\Http\Requests\UpdateTodoRequest;

interface TodoServiceInterface
{
    /**
     * Retrieve a single task.
     *
     * @param int $id
     * @return mixed
     */
    public function get(int $id);

    /**
     * Retrieve list of tasks
     *
     * @param FindTodoRequest $findTodoRequest
     * @return mixed
     */
    public function find(FindTodoRequest $findTodoRequest);

    /**
     * Add a new task
     *
     * @param AddTodoRequest $addTodoRequest
     * @return mixed
     */
    public function add(AddTodoRequest $addTodoRequest);

    /**
     * Updates an existing task
     *
     * @param int $id
     * @param UpdateTodoRequest $updateTodoRequest
     * @return mixed
     */
    public function update(int $id, UpdateTodoRequest $updateTodoRequest);

    /**
     * Deletes an existing task.
     *
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
