<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Contracts\Session\Session;

trait RedirectsUsers
{
    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        return session()->get('redirectTo');
    }
}
