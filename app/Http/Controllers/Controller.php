<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use OpenApi\Annotations as OA;

/**
 * @OA\Server(
 *   url=API_HOST
 * ),
 * @OA\Info(
 *   title="Back-end Challenge",
 *   description="Integration With The Space Flight News API",
 *   version="1.0.0",
 *   @OA\Contact(
 *     email="marciop.usa@gmail.com"
 *   )
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
