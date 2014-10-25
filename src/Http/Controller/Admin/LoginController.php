<?php namespace Anomaly\Streams\Addon\Module\Users\Http\Controller\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Anomaly\Streams\Addon\Module\Users\Login\LoginService;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\Streams\Addon\Module\Users\Authentication\AuthenticationService;
use Anomaly\Streams\Addon\Module\Users\Exception\UserNotFoundWithCredentialsException;

class LoginController extends AdminController
{
    public function login()
    {
        return view('module.users::admin/login');
    }

    public function attempt(
        Request $request,
        Redirector $redirect,
        LoginService $login,
        AuthenticationService $authentication
    ) {
        try {

            if ($user = $authentication->authenticate($request->all(), false)) {

                $login->login($user->getResource());

                return $redirect->intended('admin/dashboard'); // TODO: Get landing page from preferences

            }

        } catch (UserNotFoundWithCredentialsException $e) {

            app('streams.messages')->add('error', 'module.users::error.user_not_found');

        }

        app('streams.messages')->flash();

        return $redirect->to('admin/login');
    }
}
 