<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Notifications\UserAuthLoginNotification;
use App\Providers\RouteServiceProvider;
use App\Services\Auth\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Grosv\LaravelPasswordlessLogin\LoginUrl;

class AuthenticatedSessionController extends Controller
{

	private $userService;
	public function __construct(UserService $userService)
	{
		$this->userService = $userService;
	}

	/**
     * Display the login view.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Auth/Login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status'),
        ]);
    }

	public function sendLoginLink(LoginRequest $request){
		$user = User::where('email', data_get($request, 'email'))->first();

		if($user){

			$generator = new LoginUrl($user);
			$generator->setRedirectUrl('/dashboard');
			$url = $generator->generate();

			$user->notify(new UserAuthLoginNotification($url));


			return redirect('login-link');
		}


		return redirect()->back();


	}

	public function loginLink(){
		return Inertia::render('Auth/LoginLink');
	}

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
