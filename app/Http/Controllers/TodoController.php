<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddTodoRequest;
use App\Http\Requests\FindTodoRequest;
use App\Http\Requests\ReorderTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Services\Todo\TodoServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TodoController extends Controller
{
    /**
     * @var TodoServiceInterface
     */
    private $todoService;


    public function __construct(TodoServiceInterface $todoService) {
        $this->todoService = $todoService;
    }

    /**
     * Retrieves a task.
     *
     * @param int $id
     * @return Response
     */
    public function get(int $id)
    {
        return $this->buildJsonResponse($this->todoService->get($id));
    }

    /**
     * Retrieves a list of tasks.
     *
     * @param FindTodoRequest $findTodoRequest
     * @return Response
     */
    public function find(FindTodoRequest $findTodoRequest)
    {
        return $this->buildJsonResponse($this->todoService->find($findTodoRequest));
    }

    /**
     * Store a new task.
     *
     * @param AddTodoRequest $addTodoRequest
     * @return Response
     */
    public function add(AddTodoRequest $addTodoRequest)
    {
        return $this->buildJsonResponse($this->todoService->add(($addTodoRequest)));
    }

    /**
     * Updates a task.
     *
     * @param int $id
     * @param UpdateTodoRequest $updateTodoRequest
     * @return Response
     */
    public function update(int $id, UpdateTodoRequest $updateTodoRequest)
    {
        return $this->buildJsonResponse($this->todoService->update($id, $updateTodoRequest));
    }

    /**
     * Deletes a task.
     *
     * @param int $id
     * @return Response
     */
    public function delete(int $id)
    {
        $this->todoService->delete($id);

        return new Response(null, 204);
    }

    /**
     * Reorder tasks.
     *
     * @param  ReorderTodoRequest  $reorderTodoRequest
     * @return Response
     */
    public function reorder(ReorderTodoRequest $reorderTodoRequest)
    {
        return $this->buildJsonResponse($this->todoService->reorder($reorderTodoRequest));
    }
}
