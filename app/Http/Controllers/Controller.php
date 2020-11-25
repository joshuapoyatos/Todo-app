<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Builds a json response from the passed data adding necessary headers.
     *
     * @param mixed $data
     * @return Response
     */
    protected function buildJsonResponse($data)
    {
        return new Response([
            'data' => $data
        ], 200, [
            'Content-Type' => 'application/json'
        ]);
    }

}
