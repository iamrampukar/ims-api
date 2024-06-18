<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Response;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function sendResponse($response)
    {
        $response           =   ['success' => true] + $response;
        $response['code']   =   200;
        return Response::json($response);
    }

    /**
     * @param $error
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendError($response, $code = 404)
    {
        $response           = ['success' => false] + $response;
        $response['code']   =   $code;
        return Response::json($response, $code);
    }
}
