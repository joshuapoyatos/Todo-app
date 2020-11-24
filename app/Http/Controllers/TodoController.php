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
     * Retrieves an item.
     *
     * @param int $id
     * @return Response
     */
    public function get(int $id)
    {
        return new Response($this->todoService->get($id));
    }

    /**
     * Retrieves a list of items.
     *
     * @param FindTodoRequest $findTodoRequest
     * @return Response
     */
    public function find(FindTodoRequest $findTodoRequest)
    {
        return new Response($this->todoService->find($findTodoRequest));
    }

    /**
     * Store a new item.
     *
     * @param AddTodoRequest $addTodoRequest
     * @return Response
     */
    public function add(AddTodoRequest $addTodoRequest)
    {
        return new Response($this->todoService->add(($addTodoRequest)));
    }

    /**
     * Updates an item.
     *
     * @param int $id
     * @param UpdateTodoRequest $updateTodoRequest
     * @return Response
     */
    public function update(int $id, UpdateTodoRequest $updateTodoRequest)
    {
        return new Response($this->todoService->update($id, $updateTodoRequest));
    }

    /**
     * Deletes an item.
     *
     * @param int $id
     * @return Response
     */
    public function delete(int $id)
    {
        return new Response($this->todoService->delete($id));
    }

    /**
     * Reorder items.
     *
     * @param  ReorderTodoRequest  $reorderTodoRequest
     * @return Response
     */
    public function reorder(ReorderTodoRequest $reorderTodoRequest)
    {
        return new Response($this->todoService->reorder($reorderTodoRequest));
    }
}
