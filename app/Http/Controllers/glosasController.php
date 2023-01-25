<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Glosa;
use App\Models\Nomina;
use Carbon\Carbon;
use PDF;

class glosasController extends Controller
{
    public function mostrarFormularioInsertar(Request $request){
        return view('insertar');
    }
    public function mostrarFormularioEditar(Glosa $glosa){
        return view('editar')->with(compact('glosa'));
    }
    public function mostrarFormularioEstatus(Glosa $glosa){
        return view('estatus')->with(compact('glosa'));
    }
    public function insertar(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'max:255'],
            'ubicacion_fisica' => ['required', 'max:255'],
        ],$message =['required'=>'El campo :attribute es requerido']);

        $anio = $request->get('anio');
        $quincena = $request->get('quincena');
        $nombre = $request->get('nombre');
        $observacion = $request->get('observacion');
        $fecha_elaboracion = $request->get('fecha_elaboracion');
        $id_nomina = $request->get('nomina');
        $ubicacion_fisica = $request->get('ubicacion_fisica');
        $datos = [
            'id_nomina' => $id_nomina,
            'anio' => $anio,
            'quincena' => $quincena,
            'nombre' => $nombre,
            'ubicacion_fisica' => $ubicacion_fisica,
            'fecha_elaboracion' => $fecha_elaboracion,
            'observaciones' => $observacion
        ];

        $glosa = Glosa::create($datos);
        return redirect()->route('glosas');
    }
    public function mostrarGlosas(Request $request)
    {
        $id_nomina = $request->get('nomina');
        $anio = $request->get('anio');

        $query = Glosa::select('*')->with(['nomina']);
        if($id_nomina != "")
           $query->where('id_nomina', 'like', '%'.$id_nomina.'%');

        if($anio != "")
           $query->where('anio', 'like', '%'.$anio.'%');

        $records = $query->get();
        return view('glosa')->with(['glosas' => $records,'id_nomina'=>$id_nomina,'anio'=>$anio]);
    }
    public function editar(Request $request, Glosa $glosa)
    {
        $request->validate([
            'nombre' => ['required', 'max:255'],
            'ubicacion_fisica' => ['required', 'max:255'],
        ],$message =['required'=>'El campo :attribute es requerido']);

        $id = $request->get('id');
        $glosas = Glosa::find($id);
        $glosas->anio = $request->get('anio');
        $glosas->quincena = $request->get('quincena');
        $glosas->nombre = $request->get('nombre');
        $glosas->observaciones = $request->get('observacion');
        $glosas->fecha_elaboracion = $request->get('fecha_elaboracion');
        $glosas->id_nomina = $request->get('nomina');
        $glosas->ubicacion_fisica = $request->get('ubicacion_fisica');

        $glosas->save();
        return redirect()->route('glosas');
    }
    public function estatus(Request $request)
    {
        $id = $request->get('id');
        $glosas = Glosa::find($id);
        $glosas->fecha_elaboracion = $request->get('fecha_elaboracion');
        $glosas->fecha_entrega_srh = $request->get('fecha_entrega_srh');
        $glosas->fecha_devolucion_srh = $request->get('fecha_devolucion_srh');
        $glosas->fecha_entrega_da = $request->get('fecha_entrega_da');
        $glosas->fecha_devolucion_da = $request->get('fecha_devolucion_da');
        $glosas->fecha_digitalizacion = $request->get('fecha_digitalizacion');
        $glosas->fecha_entrega_archivo = $request->get('fecha_entrega_archivo');
        $glosas->fecha_entrega_resp = $request->get('fecha_entrega_resp');

        $request->validate([
            'fecha_elaboracion' => [ 'nullable', 'before_or_equal:' . now()->format('Y-m-d')],
            'fecha_entrega_srh' => [ 'after_or_equal:fecha_elaboracion', 'nullable', 'before_or_equal:' . now()->format('Y-m-d')],
            'fecha_devolucion_srh' => [ 'after_or_equal:fecha_entrega_srh', 'after_or_equal:fecha_elaboracion', 'nullable', 'before_or_equal:' . now()->format('Y-m-d')],
            'fecha_entrega_da' => [ 'after_or_equal:fecha_devolucion_srh', 'after_or_equal:fecha_entrega_srh', 'after_or_equal:fecha_elaboracion', 'nullable', 'before_or_equal:' . now()->format('Y-m-d')],
            'fecha_devolucion_da' => [ 'after_or_equal:fecha_entrega_da', 'after_or_equal:fecha_devolucion_srh', 'after_or_equal:fecha_entrega_srh', 'after_or_equal:fecha_elaboracion', 'nullable', 'before_or_equal:' . now()->format('Y-m-d')],
            'fecha_digitalizacion' => [ 'after_or_equal:fecha_devolucion_da', 'after_or_equal:fecha_entrega_da', 'after_or_equal:fecha_devolucion_srh', 'after_or_equal:fecha_entrega_srh', 'after_or_equal:fecha_elaboracion', 'nullable', 'before_or_equal:' . now()->format('Y-m-d')],
            'fecha_entrega_archivo' => [ 'after_or_equal:fecha_digitalizacion', 'after_or_equal:fecha_devolucion_da', 'after_or_equal:fecha_entrega_da', 'after_or_equal:fecha_devolucion_srh', 'after_or_equal:fecha_entrega_srh', 'after_or_equal:fecha_elaboracion', 'nullable', 'before_or_equal:' . now()->format('Y-m-d')],
            'fecha_entrega_resp' => ['after_or_equal:fecha_entrega_archivo', 'after_or_equal:fecha_digitalizacion', 'after_or_equal:fecha_devolucion_da', 'after_or_equal:fecha_entrega_da', 'after_or_equal:fecha_devolucion_srh', 'after_or_equal:fecha_entrega_srh', 'after_or_equal:fecha_elaboracion', 'nullable', 'before_or_equal:' . now()->format('Y-m-d')],
        ],$message =['after_or_equal'=>'No se puede ingresar una fecha anterior a la de los campos pasados', 'before_or_equal'=>'No se puede ingresar una fecha posterior a la actual']);

        $fechaElaboracion = Carbon::create($glosas->fecha_elaboracion);
        $entregaSRH = Carbon::create($glosas->fecha_entrega_srh);
        $devolucionSRH = Carbon::create($glosas->fecha_devolucion_srh);
        $entregaDA = Carbon::create($glosas->fecha_entrega_da);
        $devolucionDA = Carbon::create($glosas->fecha_devolucion_da);
        $digitalizacion = Carbon::create($glosas->fecha_digitalizacion);
        $entregaArchivo = Carbon::create($glosas->fecha_entrega_archivo);
        $entregaResp = Carbon::create($glosas->fecha_entrega_resp);
        //dd($fechaElaboracion);
        $glosas->estatus = "Creado";

        if($entregaSRH->gt($fechaElaboracion)){
            $glosas->estatus = "Firma DOP";
        }

        if($devolucionSRH->gt($entregaSRH) || $devolucionSRH == ''){
            $glosas->estatus = "Firma SRH";
        }

        if($entregaDA->gt($devolucionSRH)){
            $glosas->estatus = "Firma DA";
        }

        if($devolucionDA->gt($entregaDA) || $devolucionDA == ''){
            $glosas->estatus = "Digitalización";
        }

        if($digitalizacion->gt($devolucionDA) || $digitalizacion == ''){
            $glosas->estatus = "Entrega Archivo";
        }

        if($entregaArchivo->gt($digitalizacion) || $entregaArchivo == ''){
            $glosas->estatus = "Entrega Archivo";
        }

        if($entregaResp->gt($entregaArchivo) || $entregaResp == ''){
            $glosas->estatus = "Archivado";
        }

        $glosas->save();
        return redirect()->route('glosas');

    }

    public function mostrarReporte(Request $request){

        $nomina = $request->get('nomina');
        $anio = $request->get('anio');

        $ruta_logo = storage_path() .DIRECTORY_SEPARATOR. 'app'.DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.'logoSesa.png';

        $image = "data:image/png;base64,".base64_encode(file_get_contents($ruta_logo));
        //dd($nomina,$anio);

        $glosas = Glosa::whereIdNomina($nomina)->whereAnio($anio)->get();

        //view()->share('glosas', $glosas);
        $pdf = \PDF::loadView('ejemplo', compact('glosas', 'image'))->setPaper('letter', 'landscape');
        return $pdf->stream('ejemplo.pdf');
   }

}
