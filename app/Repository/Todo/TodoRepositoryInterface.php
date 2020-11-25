<?php


namespace App\Repository\Todo;

use App\Http\Requests\FindTodoRequest;
use App\Models\Todo;

interface TodoRepositoryInterface
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
     * @param Todo $todo
     * @return mixed
     */
    public function add(Todo $todo);

    /**
     * @param Todo $todo
     * @return mixed
     */
    public function update(Todo $todo);

    /**
     * @param int $id
     * @return mixed
     */
    public function delete(int $id);
}
