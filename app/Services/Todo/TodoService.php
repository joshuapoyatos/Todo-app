<?php

namespace App\Services\Todo;

use App\Http\Requests\AddTodoRequest;
use App\Http\Requests\FindTodoRequest;
use App\Http\Requests\ReorderTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Models\Todo;
use App\Repository\Todo\TodoRepositoryInterface;

class TodoService implements TodoServiceInterface
{
    /*
     * @var TodoRepositoryInterface
     */
    private $todoRepository;

    public function __construct(TodoRepositoryInterface $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    public function get(int $id)
    {
        return $this->todoRepository->get($id);
    }

    public function find(FindTodoRequest $findTodoRequest)
    {
        return $this->todoRepository->find($findTodoRequest);
    }

    public function add(AddTodoRequest $addTodoRequest)
    {
        $todo = new Todo([
            'title' => $addTodoRequest->input('title'),
            'description' => $addTodoRequest->input('description'),
            'rank' => $addTodoRequest->input('rank'),
        ]);

        return $this->todoRepository->add($todo);
    }

    public function update(int $id, UpdateTodoRequest $updateTodoRequest)
    {
        $todo = $this->todoRepository->get($id);

        $todo->fill($updateTodoRequest->input());

        return $this->todoRepository->update($todo);
    }

    public function delete(int $id)
    {
        return $this->todoRepository->delete($id);
    }

    public function reorder(ReorderTodoRequest $reorderTodoRequest)
    {
        $todoList = [];

        foreach ($reorderTodoRequest->input() as $todoRequest) {
            $todo = $this->todoRepository->get($todoRequest['id']);

            $todo['rank'] = $todoRequest['rank'];

            $todo = $this->todoRepository->update($todo);

            $todoList[] = $todo;
        }

        return $todoList;

    }
}
