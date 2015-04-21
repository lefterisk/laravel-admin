<?php namespace LaravelAdmin\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PasswordController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Password Reset Controller
	|--------------------------------------------------------------------------
	|
	| This controller is responsible for handling password reset requests
	| and uses a simple trait to include this behavior. You're free to
	| explore this trait and override any methods you wish to tweak.
	|
	*/

	use ResetsPasswords;

	protected $loginPath  = '/admin/auth/login';
	protected $redirectTo = '/admin';
	protected $redirectPath = '/admin/auth/login';
	protected $redirectAfterLogout = '/admin/auth/login';

	/**
	 * Create a new password controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\PasswordBroker  $passwords
	 * @return void
	 */
	public function __construct(Guard $auth, PasswordBroker $passwords)
	{
		$this->auth = $auth;
		$this->passwords = $passwords;

		$this->middleware('LaravelAdmin\Middleware\RedirectIfAuthenticated');
	}

	/**
	 * Override of parent class
	 * @return \Illuminate\View\View
	 */
	public function getEmail()
	{
		return view('admin::auth.password');
	}

	public function getReset($token = null)
	{
		if (is_null($token))
		{
			throw new NotFoundHttpException;
		}

		return view('admin::auth.reset')->with('token', $token);
	}
}
