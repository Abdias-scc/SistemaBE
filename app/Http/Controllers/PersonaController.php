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

        // $estudiantes = Persona::query()->select(
        //     'id_persona',
        //     'nombre_persona',
        //     'apellido_persona',
        //     'cedula_persona'
        // )->paginate(10);
        return view('dashboard.maestro.estudiantes', compact('estudiantes'));
    }
    //la función borrarEstudiante recibe una cédula y elimina el estudiante correspondiente
    public function deleteEstudiante($cedula)
    {
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
            $estudiante->delete();
            //Retornar una respuesta exitosa
            return response()->json([
                'status' => 'success',
                'message' => 'Estudiante eliminado correctamente.'
            ]);
            // Mensaje de error en caso de que ocurra una excepción
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al eliminar el estudiante: ' . $e->getMessage()
            ]);
        }
    }

    public function serachEstudent(){

    }
}
