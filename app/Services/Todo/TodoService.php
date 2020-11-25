<?php

namespace App\Services\Todo;

use App\Exceptions\BaseApplicationException;
use App\Exceptions\NotFoundException;
use App\Http\Requests\AddTodoRequest;
use App\Http\Requests\FindTodoRequest;
use App\Http\Requests\ReorderTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Models\Todo;
use App\Repository\Todo\TodoRepositoryInterface;
use Exception;

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

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function get(int $id)
    {
        try {
            return $this->todoRepository->get($id);
        } catch (BaseApplicationException $baseApplicationException) {
            report($baseApplicationException);

            throw $baseApplicationException;
        } catch (Exception $exception) {
            report($exception);

            throw $exception;
        }
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function find(FindTodoRequest $findTodoRequest)
    {
        try {
            return $this->todoRepository->find($findTodoRequest);
        } catch (BaseApplicationException $baseApplicationException) {
            report($baseApplicationException);

            throw $baseApplicationException;
        } catch (Exception $exception) {
            report($exception);

            throw $exception;
        }
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function add(AddTodoRequest $addTodoRequest)
    {
        try {
            $todo = new Todo([
                'title' => $addTodoRequest->input('title'),
                'description' => $addTodoRequest->input('description'),
                'rank' => $addTodoRequest->input('rank'),
            ]);

            return $this->todoRepository->add($todo);
        } catch (BaseApplicationException $baseApplicationException) {
            report($baseApplicationException);

            throw $baseApplicationException;
        } catch (Exception $exception) {
            report($exception);

            throw $exception;
        }
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function update(int $id, UpdateTodoRequest $updateTodoRequest)
    {
        try {
            $todo = $this->todoRepository->get($id);

            if (!$todo) {
                throw new NotFoundException(sprintf("Todo task does not exist. [%s]", $id));
            }

            $todo->fill($updateTodoRequest->input());

            return $this->todoRepository->update($todo);
        } catch (BaseApplicationException $baseApplicationException) {
            report($baseApplicationException);

            throw $baseApplicationException;
        } catch (Exception $exception) {
            report($exception);

            throw $exception;
        }
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function delete(int $id)
    {
        try {
            $todo = $this->todoRepository->get($id);

            if (!$todo) {
                throw new NotFoundException(sprintf("Todo task does not exist. [%s]", $id));
            }

            return $this->todoRepository->delete($id);
        } catch (BaseApplicationException $baseApplicationException) {
            report($baseApplicationException);

            throw $baseApplicationException;
        } catch (Exception $exception) {
            report($exception);

            throw $exception;
        }
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function reorder(ReorderTodoRequest $reorderTodoRequest)
    {
        try {
            $todoList = [];

            foreach ($reorderTodoRequest->input() as $todoRequest) {
                $todo = $this->todoRepository->get($todoRequest['id']);

                if (!$todo) {
                    throw new NotFoundException(sprintf("Todo task does not exist. [%s]", $todoRequest['id']));
                }

                $todo['rank'] = $todoRequest['rank'];

                $todo = $this->todoRepository->update($todo);
                $todoList[] = $todo;
            }

            return $todoList;
        } catch (BaseApplicationException $baseApplicationException) {
            report($baseApplicationException);

            throw $baseApplicationException;
        } catch (Exception $exception) {
            report($exception);

            throw $exception;
        }
    }
}
