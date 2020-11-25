<?php


namespace App\Repository\Todo;


use App\Exceptions\DatabaseException;
use App\Http\Requests\FindTodoRequest;
use App\Models\Todo;
use Illuminate\Database\QueryException;

class TodoRepository implements TodoRepositoryInterface
{
    public function __construct()
    {
    }

    /**
     * @inheritDoc
     * @throws DatabaseException
     */
    public function get(int $id)
    {
        try {

            return Todo::find($id);
        } catch (QueryException $exception) {
            report($exception);

            throw new DatabaseException($exception->getMessage());
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * @inheritDoc
     * @throws DatabaseException
     */
    public function find(FindTodoRequest $findTodoRequest)
    {
        try {
            $model = Todo::query();

            if ($findTodoRequest->input('title')) {
                $model->where('title', 'LIKE', `%{$findTodoRequest->input('title')}%`);
            }

            return $model->get();
        } catch (QueryException $exception) {
            report($exception);

            throw new DatabaseException($exception->getMessage());
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * @inheritDoc
     * @throws DatabaseException
     */
    public function add(Todo $todo)
    {
        try {
            $todo->save();

            return $todo;
        } catch (QueryException $exception) {
            report($exception);

            throw new DatabaseException($exception->getMessage());
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * @inheritDoc
     * @throws DatabaseException
     */
    public function update(Todo $todo)
    {
        try {
            $todo->update();

            return $todo;
        } catch (QueryException $exception) {
            report($exception);

            throw new DatabaseException($exception->getMessage());
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * @inheritDoc
     * @throws DatabaseException
     */
    public function delete(int $id)
    {
        try {
            return Todo::destroy($id);
        } catch (QueryException $exception) {
            report($exception);

            throw new DatabaseException($exception->getMessage());
        } catch (\Exception $exception) {
            throw $exception;
        }
    }
}
