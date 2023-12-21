<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // if user logged in==no and it tries  to acess login profile page it will redirect user to login page
        // return $request->expectsJson() ? null : route('account');
        return $request->expectsJson() ? null : route('account.login');
    }
}
