<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Modules\Log\Entities\Log;
use Illuminate\Http\JsonResponse;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Login
    public function showLoginForm()
    {
        $pageConfigs = [
            'bodyClass' => "bg-full-screen-image",
            'blankPage' => true
        ];

        return view('/auth/login', [
            'pageConfigs' => $pageConfigs
        ]);
    }

    protected function authenticated(Request $request, $user)
    {
        $log = new Log();
        $log->user_id = Auth::user()->id;
        $log->action = 'user logged in successfully';
        $log->save();

        if(Auth::user()->hasRole('admin')){

            return redirect()->route('orders');
            
        }elseif(Auth::user()->hasRole('supervisor')){

            return redirect()->route('orders');

        }elseif(Auth::user()->hasRole('operator')){

            return redirect()->route('orders.new');

        }else{

            return redirect()->route('orders.confirmed2');

        }

    }

    public function logout(Request $request)
    {
        $user = Auth::user();
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }


        $log = new Log();
        $log->user_id = $user->id;
        $log->action = 'user logged off successfully';
        $log->save();

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/');
    }

}
