<?php declare(strict_types=1);

namespace App\Repositories\Implementations;

use App\Models\User;
use App\Repositories\Interfaces\UserInt;

class User extends Common implements UserInt
{
    /** @var User $user */
    private $user;

    public function __construct (User $user)
    {
        parent::__construct($user);

        $this->user = $user;
    }

    public function login()
    {

    }

    public function passwordrecover()
    {

    }

    public function passwordreset()
    {

    }
}
