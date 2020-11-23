<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddTodoRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TodoController extends Controller
{
    /**
     * Retrieves an item.
     *
     * @param  Request  $request
     * @return Response
     */
    public function get(Request $request)
    {

        return new Response($request->getContent());
    }

    /**
     * Store a new item.
     *
     * @param AddTodoRequest $request
     * @return Response
     */
    public function add(AddTodoRequest $request)
    {

        return new Response($request->getContent());
    }

    /**
     * Updates an item.
     *
     * @param  Request  $request
     * @return Response
     */
    public function update(Request $request)
    {
        return new Response($request->getContent());
    }

    /**
     * Deletes an item.
     *
     * @param  Request  $request
     * @return Response
     */
    public function delete(Request $request)
    {
        return new Response($request->getContent());
    }

    /**
     * Reorder items.
     *
     * @param  Request  $request
     * @return Response
     */
    public function reorder(Request $request)
    {
        return new Response($request->getContent());
    }
}
