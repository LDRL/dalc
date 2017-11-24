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
        $farmacia = DB::table('role_user as ru')
            ->select(DB::raw('count(ru.id) as conteo'))
            ->where('ru.role_id','=','2')
            ->where('ru.user_id','=',Auth::user()->id)
            ->first();

        $empleado = DB::table('role_user as ru')
            ->select(DB::raw('count(ru.id) as conteo'))
            ->where('ru.role_id','=','5')
            ->where('ru.user_id','=',Auth::user()->id)
            ->first();


        /*$tableroini = DB::table('tablero as evento')
            ->select('evento.imagen')
            ->where('evento.home','=',1)
            ->orderBy('evento.fechapublica','desc')
            ->get();
        */

        if($farmacia->conteo > 0 and $empleado->conteo >0)
        {
            $mensaje = DB::select("call Alerta_M");
            $value = $request->session($mensaje[0]->conteo);
            Session::put('mensaje',$mensaje[0]->conteo);

            $mempleado = DB::select("call Alerta_T");
            $value = $request->session($mempleado[0]->conteo);
            Session::put('mempleado',$mempleado[0]->conteo);

            return view('home',array('mensaje'=>$mensaje,'mempleado'=>$mempleado));
        }
        else if ($farmacia->conteo > 0)
        {
            $mensaje = DB::select("call Alerta_M");
            $value = $request->session($mensaje[0]->conteo);
            Session::put('mensaje',$mensaje[0]->conteo);

            return view('home',array('mensaje'=>$mensaje));
        }
        else if ($empleado->conteo >0) {
            $mempleado = DB::select("call Alerta_T");
            $value = $request->session($mempleado[0]->conteo);
            Session::put('mempleado',$mempleado[0]->conteo);

            return view('home',array('mempleado'=>$mempleado));
        }
        else{
            return view('home');
        }
    }
}
