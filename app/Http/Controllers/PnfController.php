<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pnf;

class PnfController extends Controller
{
    public function info(Request $request)
    {   
        if(is_numeric($request->input('search'))){
            return abort(404);
        }

        if($request->has("search")){
            $search = $request->input("search");
            $pnfs = Pnf::query()->where('nombre_pnf', 'LIKE', "%{$search}%")->select(
                'id_pnf',
                'nombre_pnf',
                'id_estatus'
            )->paginate(10);
        }else{
            //Si no hay búsqueda, obtener todos los PNF
            $pnfs = Pnf::query()->select(
                'id_pnf',
                'nombre_pnf',
                'id_estatus'
            )->paginate(10);
        }

        return view('dashboard.maestro.pnf', compact('pnfs'));

    }

    public function agregar(Request $request){
            // Validación de datos
        $validated = $request->validate([
            'nombre_pnf' => 'required|string|max:255'
        ]);
        if($validated)
        {
            $pnf_nuevo = $request->nombre_pnf;
            //Verificar si el nombre del PNF ya existe
            if(Pnf::where('nombre_pnf', $pnf_nuevo)->exists()){
                return response()->json([
                    'status' => false,
                    'message' => 'El nombre del PNF ya existe.'
                ],400);
            }
            //Creamos el nuevo PNF
            Pnf::create([
                'nombre_pnf' => $pnf_nuevo,
                'id_estatus' => 1,
            ]);

            return response()->json([
                'status'=> true,
                'message'=> 'El PNF ha sido creado exitosamente.'
            ], 200);

        }
    }
    
    public function borrar($id){

        $pnf = Pnf::find($id);
        //Si por alguna RAZON ILOGICA no se encuentra el PNF
        if(!$pnf){
            return response()->json([
                'status'=> false,
                'message'=> 'El PNF no existe.'
            ],404);
        }
        //Eliminamos el PNF
        $pnf->delete();
        //devolvemos una respuesta
        return response()->json([
            'status'=> true,
            'message'=> 'El PNF ha sido borrado exitosamente.'
        ],200);
    }

    public function estatus($id){
        
        $pnf = Pnf::find($id);
        //Si por alguna RAZON ILOGICA no se encuentra el PNF
        if(!$pnf){
            return response()->json([
                'status'=> false,
                'message'=> 'El PNF no existe.'
            ],404);
        }
        //recupero el estatus del PNF
        $estatus_pnf = $pnf->id_estatus;

        $estatus = ($estatus_pnf == 1) ? 2 : 1;
        
        //actualizo el estatus del PNF y guardamos
        $pnf->id_estatus = $estatus;
        $pnf->save();

        return response()->json([
            'status'=> true,
            'message'=> 'El estatus del PNF ha sido actualizado exitosamente.',
            'estatus_pnf'=> $estatus
        ],200);

    }

    public function editar(Request $request)
    {
        $validated = $request->validate([
            'id_pnf' => 'required|numeric',
            'nuevo_nombre_pnf' => 'required|string|max:255'
        ]);

        if($validated){
            $id_pnf = $request->id_pnf;
            $nuevo_nombre_pnf = $request->nuevo_nombre_pnf;
            //Verificar si el nombre del PNF ya existe
            $pnf = Pnf::find($id_pnf);

            if(!$pnf){
                return response()->json([
                    'status'=> false,
                    'message'=> 'El PNF no existe.'
                ],404);
            }

            $pnf->nombre_pnf = $nuevo_nombre_pnf;
            $pnf->save();

            return response()->json([
                'status'=> true,
                'message'=> 'El PNF ha sido actualizado exitosamente.',
            ],200);


        }
    }
}
