<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{

    protected $guard = 'web';

    public function __construct(Request $request)
    {
        if ($request->is('admin/*')) {
            $this->guard = 'admin';
        }
    }

    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login', [
            'routePrefix' => $this->guard == 'admin' ? 'admin.' : '',
        ]);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {

        // of course this method best because one line and use to checking processing for login
        $request->authenticate($this->guard);

        // this's other way to check login this best from next way
        // attempt method it use to checking processing
        // Auth::attempt([
        //     'email' => $request->post('email'),
        //     'password' => $request->post('password'),
        // ]);

        // $user = User::where('email', '=', $request->post('email'))
        //             ->orWhere('mobile', '=', $request->post('email'))
        //             ->orWhere('username', '=', $request->post('email'))
        //     //->where('password', '=', Hash::make($request->post('password')))
        //     ->first();

        // if (!$user || !Hash::check($request->post('password'), $user->password)) {
        //     throw ValidationException::withMessages([
        //         'email' => 'Invalid credentials!',
        //     ]);
        // }

        // Auth::login($user);
        $request->session()->regenerate();

        return redirect()->intended($this->guard == 'admin' ? 'dashboard/categories' : RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard($this->guard)->logout();

        $request->session()->invalidate();
        // other way both will give the same result
        // session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
