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

class EmpleadoController1 extends Controller
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

    public function inactivo(Request $request)
    {
        $empleado = Persona::all()->where('idtipopersona','=','1')->where('idstatus','=',2);
        return view('empleado.inactivos',["empleado"=>$empleado]);
    }

    public function add(Request $request)
    {
        $tipopersona = TipoPersona::all()->where('idtipopersona','=',1);
        $puesto = Puesto::all();
        $tipoantecedente = TipoAntecedente::all();
        $estadocivil = EstadoCivil::all();
        return view('empleado.create',["tipopersona"=>$tipopersona,"puesto"=>$puesto,"tipoantecedente"=>$tipoantecedente,"estadocivil"=>$estadocivil]);
    }

    public function store(Request $request)
    {
        try {
            $this->validateRequest($request);
            DB::beginTransaction();

            $miArray = $request->items;

            $today = Carbon::now();
            $year = $today->format('Y');

            $fechanacimiento=$request->get('fecha_nacimiento');
            $fechanacimiento=Carbon::createFromFormat('d/m/Y',$fechanacimiento);
            $fechanacimiento=$fechanacimiento->format('Y-m-d');


            $fechainicio=$request->get('fecha_inicio');
            $fechainicio=Carbon::createFromFormat('d/m/Y',$fechainicio);
            $fechainicio=$fechainicio->format('Y-m-d');

            $persona =new Persona;

            $persona-> nombre=$request->get('nombre');
            $persona-> apellido=$request->get('apellido');
            $persona-> direccion=$request->get('direccion');
            $persona-> telefono=$request->get('telefono');
            $persona-> idtipopersona=1;
            $persona-> idcivil=$request->get('idcivil');
            $persona-> nit=$request->get('nit');
            $persona-> dpi=$request->get('dpi');
            $persona-> imagen=$request->get('imagen');
            $persona-> correo=$request->get('correo');
            $persona-> fechanacimiento=$fechanacimiento;
            $persona-> idstatus=1;
            $persona-> permanente = 'empleado';

            $persona->save();

            $empleado = new Empleado;

            $empleado-> idpersona   = $persona->idpersona;
            $empleado-> fechainicio = $fechainicio;

            $empleado-> tarjetasalud=$request->get('tarjetasalud');
            $empleado-> salario=$request->get('salario');
            $empleado-> idpuesto=$request->get('idpuesto');
            
            $empleado->save();

            foreach ($miArray as $key => $value) {
                $tramite = new Tramite;

                $tramite->idempleado = $empleado->idempleado;
                $tramite->idtipoantecedente = $value['0'];
                $fechavencimiento = $value['1'];

                $fechavencimiento=Carbon::createFromFormat('d/m/Y',$fechavencimiento);
                $fechavencimiento=$fechavencimiento->format('Y-m-d');

                $tramite-> fechavencimiento=$fechavencimiento;
                $tramite->save();
            }
        DB::commit();

        } catch (Exception $e) {
            DB::rollback();
            return response()->json(array('error'=>'No se ha podido enviar la peticion de agregar nuevo empreado'),404);
        }

        return json_encode($empleado);    
    }

    public function edit($id)
    {
        $empleado = DB::table('empleado as emp')
            ->join('persona as per','emp.idpersona','=','per.idpersona')
            ->select('emp.fechainicio','emp.salario','emp.idpuesto','per.nombre','per.apellido','per.direccion','telefono','per.nit','per.dpi','per.correo','per.fechanacimiento','emp.idpersona','per.idcivil')
            ->where('emp.idpersona','=',$id)
            ->first();
        $pactual = DB::table('puesto as p')->select('p.idpuesto','p.nombrepuesto')->where('p.idpuesto','=',$empleado->idpuesto)->first();
        $puesto = Puesto::all();
        $eactual = DB::table('estadocivil as eci')->select('eci.idcivil','eci.nombre')->where('eci.idcivil','=',$empleado->idcivil)->first();
        $estadocivil = EstadoCivil::all();

        return view('empleado.edit',["puesto"=>$puesto,"empleado"=>$empleado,"estadocivil"=>$estadocivil,"eactual"=>$eactual,"pactual"=>$pactual]);
    }

    public function update(Request $request, $id)
    {
        try {
            $this->validateRequestEdit($request);

            $idempleado = DB::table('empleado as emp')
            ->select('emp.idempleado')
            ->where('emp.idpersona','=',$id)
            ->first();

            $today = Carbon::now();
            $year = $today->format('Y');

            $fechanacimiento=$request->get('fecha_nacimiento');
            $fechanacimiento=Carbon::createFromFormat('d/m/Y',$fechanacimiento);
            $fechanacimiento=$fechanacimiento->format('Y-m-d');

            $fechainicio=$request->get('fecha_inicio');
            $fechainicio=Carbon::createFromFormat('d/m/Y',$fechainicio);
            $fechainicio=$fechainicio->format('Y-m-d');

            $persona =Persona::find($id);

            $persona-> nombre=$request->get('nombre');
            $persona-> apellido=$request->get('apellido');
            $persona-> direccion=$request->get('direccion');
            $persona-> telefono=$request->get('telefono');
            $persona-> idcivil=$request->get('idcivil');
            $persona-> nit=$request->get('nit');
            $persona-> dpi=$request->get('dpi');
            $persona-> imagen=$request->get('imagen');
            $persona-> correo=$request->get('correo');
            $persona-> fechanacimiento=$fechanacimiento;
            $persona-> idstatus=1;

            $persona->save();


            $empleado = Empleado::find($idempleado->idempleado);

            $empleado-> fechainicio = $fechainicio;
            $empleado-> tarjetasalud=$request->get('tarjetasalud');
            $empleado-> salario=$request->get('salario');
            $empleado-> idpuesto=$request->get('idpuesto');
            
            $empleado->save();

        } catch (Exception $e) {
            DB::rollback();
            return response()->json(array('error'=>'No se ha podido enviar la peticion de agregar nuevo empreado'),404);
        }

        return json_encode($empleado);
    }

    public function show($id)
    {
        $detalle = DB::table('persona as per')
            ->join('empleado as emp','per.idpersona','=','emp.idpersona')
            ->join('estadocivil as est','per.idcivil','=','est.idcivil')
            ->select('emp.idempleado','per.nombre','per.apellido','per.dpi','per.nit',
                'per.direccion','per.telefono','per.correo','est.nombre as estadocivil',(DB::raw('DATE_FORMAT(per.fechanacimiento,"%d/%m/%Y") as fechanacimiento')))
            ->where('per.idpersona','=',$id)
            ->first();

        $tramite = DB::table('tramite as tra')
            ->join('empleado as emp','tra.idempleado','=','emp.idempleado')
            ->join('tipoantecedente as tip','tra.idtipoantecedente','=','tip.idtipoantecedente')
            ->select('tra.idtramite','tip.nombreantecedente',(DB::raw('DATE_FORMAT(tra.fechavencimiento,"%d/%m/%Y") as fechavencimiento')))
            ->where('tra.idempleado','=',$detalle->idempleado)
            ->get();

        $tipoantecedente = TipoAntecedente::all();

        return view('empleado.detalle',["detalle"=>$detalle,"tramite"=>$tramite,"tipoantecedente"=>$tipoantecedente]);        
    }

    public function delete(Request $request)
    {
        $persona = Persona::find($request->empleado);
        $persona->idstatus = 2;
        $persona->save(); 
        return json_encode($persona);
    }

    public function recuperar($id)
    {
        $st=Persona::findOrFail($id);
        $st-> idstatus= 1;
        $st->update();
        return response()->json($st);
    }

    public function storeec(Request $request){
        $this->validateRequestO($request);
        $infec = new EstadoCivil;
        $infec-> nombre =$request->get('nombre');
        $infec->save();

        return response()->json($infec);
    }

    public function storepu(Request $request){
        $this->validateRequestO($request);
        $infec = new Puesto;
        $infec-> nombrepuesto =$request->get('nombre');
        $infec->save();
        
        return response()->json($infec);
    }

    public function storeta(Request $request){
        $this->validateRequestO($request);
        $infec = new TipoAntecedente;
        $infec-> nombreantecedente =$request->get('nombre');
        $infec->save();
        
        return response()->json($infec);
    }

    public function tramitexvencer()
    {
        $tramitexvencer = DB::table('empleado as emp')
            ->join('persona as per','emp.idpersona','=','per.idpersona')
            ->join('tramite as tra','emp.idempleado','=','tra.idempleado')
            ->join('tipoantecedente as tpa','tra.idtipoantecedente','=','tpa.idtipoantecedente')
            ->select('tra.idtramite','per.nombre', 'per.apellido', 'tpa.nombreantecedente as antecedente',(DB::raw('DATE_FORMAT(tra.fechavencimiento,"%d/%m/%Y") as fechavencimiento')))
            ->orderby('tra.fechavencimiento','asc')
            ->get();

        $tipoantecedente = TipoAntecedente::all();

        return view ('empleado.tramitexvencer',["tramitexvencer"=>$tramitexvencer,"tipoantecedente"=>$tipoantecedente]);
    }

    public function validateRequest($request){                
        $rules=[
            'nombre' => 'required',
            'apellido' => 'required',
            'correo'=>'required',
            'fecha_nacimiento'=> 'required',
            'idpuesto'=>'required',
            'fecha_inicio'=>'required',   
        ];

        $messages=[
            'required' => 'Debe ingresar :attribute.',
            'max'  => 'La capacidad del campo :attribute es :max'
        ];
        $this->validate($request, $rules,$messages);         
    }

    public function validateRequestEdit($request){                
        $rules=[
            'nombre' => 'required',
            'apellido' => 'required',
            'correo'=>'required',
            'fecha_nacimiento'=> 'required',
            'idpuesto'=>'required',
            'fecha_inicio'=>'required',   
        ];

        $messages=[
            'required' => 'Debe ingresar :attribute.',
            'max'  => 'La capacidad del campo :attribute es :max'
        ];
        $this->validate($request, $rules,$messages);         
    }

    public function validateRequestO($request){                
        $rules=[
            'nombre' => 'required',
        ];

        $messages=[
            'required' => 'Debe ingresar :attribute.',
        ];
        $this->validate($request, $rules,$messages);         
    }
}
