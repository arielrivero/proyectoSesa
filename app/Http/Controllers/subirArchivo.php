<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Empleado;
use App\Models\Concepto;
use Views\imprimir;

class subirArchivo extends Controller
{

    public function subirArchivo(Request $request)
    {


        //Recibimos el archivo y lo guardamos en la carpeta storage/app/public
        $test =   $request->file('archivo')->store('public');
        $file_path = storage_path().DIRECTORY_SEPARATOR."app".DIRECTORY_SEPARATOR.$test;

        
        $test1 = \DB::statement("DELETE FROM conceptos");
        
        $test2 = \DB::statement("DELETE FROM empleados");

        //dd($test,$test2);


        //abrir archivo
        $f = fopen($file_path, "r");
        //iterar sobre el archivo
        $i = 0;
        while ($data = fgetcsv($f)) {

            //dd($data);

            if($i==0)
            {
                $primerIndice = 16;
                $numeroConceptos = count($data) - 16;
                
                $nombreConceptos = [];

                for($x=0; $x < $numeroConceptos; $x++){
                    
                    if( $data[$x + $primerIndice] != ""){
                        $nombreConceptos[] =[
                            'indice'   => $x + $primerIndice,
                            'concepto' => str_replace(" | ","",$data[$x + $primerIndice]) 
                        ];
                    }
                    
                }
                //dd($conceptos);
            }


            if ($data[0] != '#') {

                //dd($data);
                $empleado = Empleado::create([
                    'rfc' => $data[1],
                    'nombre' => $data[2],
                    'est_mun' => $data[3],
                    'puesto' => $data[4],
                    'horas' => $data[5],
                    'porc_puesto' => $data[6],
                    'periodo_pago' => $data[7],
                    'tipo_pago' => $data[8],
                    'num_cheque' => $data[9],
                    'digito_verificador' => $data[10],
                    'num_cuenta' => $data[11],
                    'total_percep' => $data[12],
                    'total_ded' => $data[13],
                    'neto' => $data[14]
                ]);

                //dd($empleado->id);

                
                foreach($nombreConceptos as $nc){
                    //cargar conceptos del registro actual
                    
                    if($data[$nc['indice']] != ''){
                        $concepto = Concepto::create([
                            'id_empleado' => $empleado->id,
                            'concepto' => $nc['concepto'],
                            'importe' => $data[$nc['indice']]
                        ]);
                    }

                    
                
                }
                

                //dd($concepto);
            }

            $i++;
        }
        

        //cerrar archivo
        fclose($f);

        return view('carga_exitosa');
        
    }

    public function mostrarEmpleados(Request $request)
    {

        Paginator::useBootstrap();

        $nombre = $request->get('nombre');
        $puesto = $request->get('puesto');

        $query = Empleado::select('*');

        if($nombre != "")
           $query->where('nombre', 'like', '%'.$nombre.'%');

        if($puesto != "")
           $query->where('puesto', 'like', '%'.$puesto.'%');

        $records = $query->paginate(20)->withQueryString();
        return view('imprimir')->with(['empleados' => $records,'nombre'=>$nombre,'puesto'=>$puesto]);

    }

    public function detalleRegistro(Empleado $empleado){
        //$conceptos = Concepto::where('id_empleado','=',$empleado->id)->get()->toArray();
        
        //dd($empleado->id);
        $datos = Empleado::whereId($empleado->id)->get();
        //dd($datos);
        $conceptos = Concepto::whereIdEmpleado($empleado->id)->get();
        //dd($conceptos);
        

        return view('imprimirconceptos')->with(['datos' => $datos, 'conceptos' => $conceptos]);

    }

    public function contabilidad(Request $request){
        
        $contabilidad = "SELECT concepto, count(concepto) as casos, sum(importe) as total FROM conceptos group by concepto"; 
        $resultado = \DB::select($contabilidad);
        
        //dd($resultado);

        return view('contabilidad')->with(['resultado' => $resultado]);
    }

}
