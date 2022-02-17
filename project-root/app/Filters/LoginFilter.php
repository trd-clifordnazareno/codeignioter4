<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class LoginFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $auth = service('auth');
        if ($auth->isLoggedIn() != true) {
            session()->set('redirect_url', current_url()); // redirect to the original requested page that hasnt login
            return redirect()->to('/Signup/loginpage')
                         ->with('notlogin', 'please login first');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}