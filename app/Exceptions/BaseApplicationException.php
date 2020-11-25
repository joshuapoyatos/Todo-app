<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BaseApplicationException extends Exception
{
    /**
     * Render the exception into an HTTP response.
     *
     * @param Request $request
     * @return Response
     */
    public function render(Request $request)
    {
        return new Response([
            "errorCode" => 'DatabaseException',
            "errorMessage" => $this->getMessage(),
        ], 400);
    }
}
