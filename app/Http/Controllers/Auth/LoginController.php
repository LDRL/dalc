<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;


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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

/*
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/login');
    }
    */

    public function sectionmensaje()
    {
        $mensaje = DB::table('almacen as a')
        ->join('users as U','n.idreceptor','=','U.id')
        ->select(DB::raw('count(n.idnotificacion) as conteo'))
        ->where('n.idreceptor','=',Auth::user()->id)
        ->where('n.estado','=',1)
        ->first();

        Session::put('mensaje',$mensaje->conteo);
    }
}
