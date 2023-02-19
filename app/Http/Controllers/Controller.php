<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *     description="This is an Laravel Post API",
 *     version="1.0.0",
 *     title="Post"
 * )
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="Post Demo API Server"
 * )
 * 
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
