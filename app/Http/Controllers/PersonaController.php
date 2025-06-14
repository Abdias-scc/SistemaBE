<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;

class PersonaController extends Controller
{   
    //la función info retorna la vista de los estudiantes en tablas
    public function info(Request $request)
    {
        // Verificar si se ha enviado una búsqueda
        if ($request->has('search')) {
            $search = $request->input('search');
            // Filtrar los estudiantes por nombre, apellido o cédula
            $estudiantes = Persona::query()
                ->where('nombre_persona', 'LIKE', "%{$search}%")
                ->orWhere('apellido_persona', 'LIKE', "%{$search}%")
                ->orWhere('cedula_persona', 'LIKE', "%{$search}%")
                ->select(
                    'id_persona',
                    'nombre_persona',
                    'apellido_persona',
                    'cedula_persona'
                )
                ->paginate(10);
        } else {
            // Si no hay búsqueda, obtener todos los estudiantes
            $estudiantes = Persona::query()->select(
                'id_persona',
                'nombre_persona',
                'apellido_persona',
                'cedula_persona'
            )->paginate(10);
        }
        // Retornar la vista con los estudiantes
        return view('dashboard.maestro.estudiantes', compact('estudiantes'));
    }
    //la función borrarEstudiante recibe una cédula y elimina el estudiante correspondiente
    public function deleteEstudiante($cedula)
    {   
        // Validar la cédula
        if(!is_numeric($cedula)){
            return abort(404, 'Cédula inválida. Debe ser un número.');
        }

        try{    
            //Recuperar el estudiante por su cédula
            $estudiante = Persona::where('cedula_persona', $cedula)->first();
            //Si no se encuentra el estudiante, retornar un error
            if(!$estudiante){
                return response()->json([
                    'status' => 'error',
                    'message' => 'Estudiante no encontrado.'
                ], 404);
            }
            //Eliminar el estudiante
            $estudiante
            ->where('cedula_persona', $cedula)
            ->delete();
            
            //Retornar una respuesta exitosa
            return response()->json([
                'status' => 'success',
                'message' => 'Estudiante eliminado correctamente.'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al eliminar el estudiante: ' . $e->getMessage()
            ], 500);
        }
    }
    
    //La funcion showDetail recibe una cédula y retorna la datos detallados del estudiante
    public function detalleEstudiante($cedula)
    {
        if(!is_numeric($cedula)){
            return abort(404, 'Cédula inválida. Debe ser un número.');
        }
        // Buscar el estudiante por su cédula
        try{
            $estudiante = Persona::where('cedula_persona', $cedula)->with("personaPnfs.pnf")->first();
            // Si no se encuentra el estudiante, retornar un error
            if (!$estudiante) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Estudiante no encontrado.'
                ], 404);
            }
            // Retornar los detalles del estudiante
            $response = [
                'cedula' => $estudiante->cedula_persona,
                'nombre' => $estudiante->nombre_persona,
                'apellido' => $estudiante->apellido_persona,
                'telefono'=> $estudiante->telefono_persona,
                'genero' => $estudiante->genero_persona,
                'fecha_nacimiento' => $estudiante->fecha_nacimiento_persona,
                'patria'=> $estudiante->regis_patria,
                'email'=> $estudiante->email_persona,
                'edad'=> $estudiante->edad_persona,
                'pnf' => $estudiante->personaPnfs[0]->pnf->nombre_pnf
            ];

            return response()->json([
                'status' => 'success',
                'data' => $response
            ], 200);


        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al buscar el estudiante: ' . $e->getMessage()
            ], 500);
        }


    }

    public function serachEstudent(){

    }
}
