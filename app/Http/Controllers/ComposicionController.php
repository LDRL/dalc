<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComposicionController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function addc(Request $request)
    {

        $tipomedicamento = TipoMedicamento::all();
        return view('medicamento.composicion.createc',["tipomedicamento"=>$tipomedicamento]);
    }
}
