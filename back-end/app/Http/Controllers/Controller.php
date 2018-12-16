<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Represent 200 status ok.
     *
     * @var int
     */
    const OK = 200;

    /**
     * Represent 404 status resource not found.
     *
     * @var int
     */
    const NOT_FOUND = 404;
}
