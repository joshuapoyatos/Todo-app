<?php


namespace App\Repository\Todo;

use App\Http\Requests\FindTodoRequest;
use App\Models\Todo;

interface TodoRepositoryInterface
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
     * @param Todo $todo
     * @return mixed
     */
    public function add(Todo $todo);

    /**
     * Updates an existing task
     *
     * @param Todo $todo
     * @return mixed
     */
    public function update(Todo $todo);

    /**
     * Deletes an existing task.
     *
     * @param int $id
     * @return mixed
     */
    public function delete(int $id);
}
