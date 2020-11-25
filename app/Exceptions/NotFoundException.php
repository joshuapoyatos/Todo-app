<?php

namespace App\Exceptions;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NotFoundException extends BaseApplicationException
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
            "errorCode" => 'NotFoundException',
            "errorMessage" => $this->getMessage(),
        ], 404);
    }
}
