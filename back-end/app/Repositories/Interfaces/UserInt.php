<?php declare(strict_types=1);

namespace App\Repositories\Interfaces;

/**
 * Interface UserInt.
 *
 * interface to extend common methods.
 */
interface UserInt extends Common
{
    public function login();

    public function passwordrecover();

    public function passwordreset();
}
