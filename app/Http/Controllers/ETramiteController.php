<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\TipoPersona;
use App\Puesto;
use App\TipoAntecedente;
use App\Persona;
use App\Empleado;
use App\Tramite;
use App\EstadoCivil;

use Carbon\Carbon;  // para poder usar la fecha y hora
use Illuminate\Support\Facades\Auth; 


use Illuminate\Support\Facades\Log;
use DB;

class ETramiteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $empleado = Persona::all()->where('idtipopersona','=','1')->where('idstatus','=',1);
        return view('empleado.index',["empleado"=>$empleado]);
    }

    public function edit($id){
    	$tramite = DB::table('tramite as tra')
    	->join('tipoantecedente as tan','tra.idtipoantecedente','=','tan.idtipoantecedente')
    	->select('tra.idtramite',(DB::raw('DATE_FORMAT(tra.fechavencimiento,"%d/%m/%Y") as fechavencimiento')),'tra.idtipoantecedente','tan.nombreantecedente as antecedente')
    	->where('idtramite','=',$id)->first();
    	return response()->json($tramite);
    }

    public function add(Request $request)
    {
        $tipopersona = TipoPersona::all()->where('idtipopersona','=',1);
        $puesto = Puesto::all();
        $tipoantecedente = TipoAntecedente::all();
        $estadocivil = EstadoCivil::all();
        //return view('empleado.create')->with("tipopersona", $tipopersona);
        return view('empleado.create',["tipopersona"=>$tipopersona,"puesto"=>$puesto,"tipoantecedente"=>$tipoantecedente,"estadocivil"=>$estadocivil]);
    }

    public function store(Request $request)
    {
        try {
            $this->validateRequest($request);
            DB::beginTransaction();

            $fechavencimiento=$request->get('fecha_vencimiento');
            $fechavencimiento=Carbon::createFromFormat('d/m/Y',$fechavencimiento);
            $fechavencimiento=$fechavencimiento->format('Y-m-d');

            $tramite = new Tramite;

            $tramite-> idtipoantecedente=$request->get('idtipoantecedente');
            $tramite-> fechavencimiento=$fechavencimiento;
            $tramite-> idempleado = $request->get('empleado');

            $tramite->save();

            $tramites = DB::table('tramite as tra')
	    	->join('tipoantecedente as tan','tra.idtipoantecedente','=','tan.idtipoantecedente')
	    	->select('tra.idtramite',(DB::raw('DATE_FORMAT(tra.fechavencimiento,"%d/%m/%Y") as fechavencimiento')),'tra.idtipoantecedente','tan.nombreantecedente as antecedente')
	    	->where('idtramite','=',$tramite->idtramite)->first();

        	DB::commit();

        } catch (Exception $e) {
            DB::rollback();
            return response()->json(array('error'=>'No se ha podido enviar la peticion de agregar nuevo empreado'),404);
            
        }

        return json_encode($tramites);    
    }

    public function update(Request $request, $id)
    {
        try {
            $this->validateRequest($request);

            $today = Carbon::now();
            $year = $today->format('Y');

            $fechavencimiento=$request->get('fecha_vencimiento');
            $fechavencimiento=Carbon::createFromFormat('d/m/Y',$fechavencimiento);
            $fechavencimiento=$fechavencimiento->format('Y-m-d');

            $tramite =Tramite::find($id);

            $tramite-> idtipoantecedente=$request->get('idtipoantecedente');
            $tramite-> fechavencimiento=$fechavencimiento;

            $tramite->save();

            $tramite = DB::table('tramite as tra')
	    	->join('tipoantecedente as tan','tra.idtipoantecedente','=','tan.idtipoantecedente')
	    	->select('tra.idtramite',(DB::raw('DATE_FORMAT(tra.fechavencimiento,"%d/%m/%Y") as fechavencimiento')),'tra.idtipoantecedente','tan.nombreantecedente as antecedente')
	    	->where('idtramite','=',$id)->first();
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(array('error'=>'No se ha podido enviar la peticion de agregar nuevo empreado'),404);
        }

		return response()->json($tramite);
    }


    public function delete($id)
    {
        $tramite = Tramite::find($id);
        $tramite->delete();
        return response()->json($tramite);
    }

    public function validateRequest($request){                
        $rules=[
            'fecha_vencimiento'=> 'required',
            'idtipoantecedente'=>'required',
        ];

        $messages=[
            'required' => 'Debe ingresar :attribute.',
            'max'  => 'La capacidad del campo :attribute es :max'
        ];
        $this->validate($request, $rules,$messages);         
    }
}
