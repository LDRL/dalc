<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $empleado = DB::table('role_user as ru')
            ->select(DB::raw('count(ru.id) as conteo'))
            ->where('ru.role_id','=','2')
            ->where('ru.user_id','=',Auth::user()->id)
            ->first();

        if($empleado->conteo > 0)
        {
            $mensaje = DB::select("call Alerta_M");
            $value = $request->session($mensaje[0]->conteo);
            Session::put('mensaje',$mensaje[0]->conteo);

            return view('home',array('mensaje'=>$mensaje));
        }
        else{
            return view('home');
        }
    }
}
