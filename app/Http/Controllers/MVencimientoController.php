<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Compra;
use App\Medicamento;
use App\Ubicacion;
use App\Almacen;
use App\Requisicion;
use App\RequisicionDetalle;
use Carbon\Carbon;  // para poder usar la fecha y hora
use Illuminate\Support\Facades\Auth;

class MVencimientoController extends Controller
{
    public function index()
    {
        $requisicion = DB::table('requisicion as req')
        //->join('requisiciondetalle as rde','req.idrequisicion','=','rde.idrequisicion')
        ->join('usuario as U','req.idusuario','=','U.id')
        ->join('tiporequisiscion as tre','req.idtiporequisicion','=','tre.idtiporequisicion')
        ->select('req.idrequisicion','U.name','tre.nombre as tiporequisicion')
        ->where('tre.idtiporequisicion','=',2)
        ->get();

        return view('medicamento.fechaven.index',["requisicion"=>$requisicion]);
    }

    public function add(Request $request)
    {
        $medicamento = DB::table('medicamento as med')
        ->join('marca as mar','med.idmarca','=','mar.idmarca')
        ->join('presentacion as pre','med.idpresentacion','=','pre.idpresentacion')
        ->select('med.idmedicamento','mar.marca','pre.nombre as presentacion','med.medicamento')
        ->get();

        return view('medicamento.fechaven.create',["medicamento"=>$medicamento]);
    }

    public function store(Request $request)
    {
        //$this->validateRequest($request);
        try {
            DB::beginTransaction();

            $miArray = $request->items;
            
            $requisicion = new Requisicion;
            $requisicion-> idusuario =  Auth::user()->id;
            $requisicion-> idtiporequisicion = 2;

            $requisicion->save();


            foreach ($miArray as $key => $value) {
                $idmedicamento = $value['0'];

                $requisiciondetalle = new RequisicionDetalle;
                $requisiciondetalle->idrequisicion = $requisicion->idrequisicion;
                $requisiciondetalle->idmedicamento = $idmedicamento;
                $requisiciondetalle->cantidad = $value['1'];

                $medicamento = Medicamento::find($idmedicamento);
                $medicamento->cantidad = $medicamento->cantidad - $value['1'];
                $medicamento->save();
                $requisiciondetalle->save();

                $descuento = DB::select("call detalle_insertar(?,?)",array($idmedicamento,$value['1']));
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(array('error'=>'No se ha podido enviar la petición de agregar nuevo proveedor'),404);
        }
        return json_encode($requisicion);
    }

    public function modalrequisicion()
    {
        $medicamento = DB::table('medicamento as med')
        ->join('marca as mar','med.idmarca','=','mar.idmarca')
        ->join('presentacion as pre','med.idpresentacion','=','pre.idpresentacion')
        ->select('med.idmedicamento','med.medicamento','pre.nombre as presentacion','mar.marca','med.cantidad')
        ->get();
        
        return view('medicamento.fechaven.modalbuscarm',["medicamento"=>$medicamento]);
    }

    public function busqueda($id)
    {
        $medicamento = DB::table('medicamento as med')
        ->join('marca as mar','med.idmarca','=','mar.idmarca')
        ->join('presentacion as pre','med.idpresentacion','=','pre.idpresentacion')
        ->select('med.idmedicamento','mar.marca','pre.nombre as presentacion','med.medicamento','med.cantidad')
        ->where('med.idmedicamento','=',$id)
        ->first();

        return view ('medicamento.fechaven.modalmedicamento',["medicamento"=>$medicamento]);
    }

    public function show($id)
    {
        $detalle = DB::table('requisicion as req')
        //->join('requisiciondetalle as rde','req.idrequisicion','=','rde.idrequisicion')
        ->join('usuario as U','req.idusuario','=','U.id')
        ->join('tiporequisiscion as tre','req.idtiporequisicion','=','tre.idtiporequisicion')
        ->select('req.idrequisicion','U.name','tre.nombre as tiporequisicion')
        ->where('req.idrequisicion','=',$id)
        ->first();

        $requisiciondetalle = DB::table('requisiciondetalle as rde')
        ->join('requisicion as req','rde.idrequisicion','=','req.idrequisicion')
        ->join('medicamento as med','rde.idmedicamento','=','med.idmedicamento')
        ->join('marca as mar','med.idmarca','=','mar.idmarca')
        ->join('presentacion as pre','med.idpresentacion','=','pre.idpresentacion')
        ->select('med.medicamento','pre.nombre as presentacion','mar.marca','rde.cantidad','rde.iddetalle')
        ->where('rde.idrequisicion','=',$id)
        ->get();

        return view('medicamento.fechaven.detalle',["detalle"=>$detalle,"requisiciondetalle"=>$requisiciondetalle]);
    }


}
