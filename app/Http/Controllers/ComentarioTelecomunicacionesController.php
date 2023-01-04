<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ComentarioTelecomunicaciones;
use App\Http\Resources\Resource;
use Illuminate\Support\Facades\Validator;

class ComentarioTelecomunicacionesController extends Controller
{
    //FUNCION PARA CREAR COMENTARIOS
    public function store(Request $request)
    {
        $rules=array(

            'comentario' => 'required|string',
            'materias_id' => 'required|numeric',
            'semestres_id' => 'required|numeric',
            'carreras_id' => 'required|numeric',
            'user_id' => 'required|numeric',
        );
        $messages=array(

            'comentario.required' => 'Debe tener un comentario.',
            'materias_id.required' => 'Debe tener un id de materia.',
            'semestres_id.required' => 'Debe tener un id de semestre.',
            'carreras_id.required' => 'Debe tener un id de carreras.',
            'user_id.required' => 'Debe tener un id de usuario.',
            // 'password_confirmation.required' => 'Ingrese la confirmación de la contraseña.',

        );
        
        $validator=Validator::make($request->all(),$rules,$messages);
        if($validator->fails())
        {
            $messages=$validator->messages();
            return response()->json(["messages"=>$messages], 500);
        }$comentarios = new ComentarioTelecomunicaciones();

        $comentarios->comentario = $request->comentario;
        $comentarios->materias_id = $request->materias_id;
        $comentarios->semestres_id = $request->semestres_id;
        $comentarios->carreras_id = $request->carreras_id;
        $comentarios->user_id = $request->user_id;

        // $registro->password_confirmation = $request->password_confirmation;
        $comentarios->save();
        return response()->json(["comentario" => $comentarios, "message"=>"El comentario se ha creado satisfactoriamente"], 200);

    }
    //FUNCION PARA VER LOS COMENTARIOS
    public function index (Request $request){

        $comentarios = ComentarioTelecomunicaciones::all();

        return response()->json([
            'data'=> $comentarios

        ]);
    }

//FUNCION PARA VER UN COMENTARIOS
    public function show (Request $request, $id){

        $comentarios = ComentarioTelecomunicaciones::find($id);
        if($comentarios){
            return response()->json([
                'mesagge' => 'Comentario a vizualizarse',
                'data'=> $comentarios

            ]);
        }else{
             return response()->json([
            'message' => 'No existe ningun comentario con ese id.',


            ], 404);

        }
    }
//FUNCION PARA ACTUALIZAR COMENTARIOS
    public function update (Request $request, $id){

        $fields = $request->validate([
            'comentario' => 'required|string',
            'materias_id' => 'required|numeric',
            'semestres_id' => 'required|numeric',
            'carreras_id' => 'required|numeric',
            'user_id' => 'required|numeric',
        ]);

        $comentarios = ComentarioTelecomunicaciones::find($id);


        if($comentarios){
            $comentarios->update($fields);

            return response()->json([
                'message' => 'El comentario se actualizado satisfactoriamente.',
                'data'=> $comentarios
            ]);
        }
        else{
            return response()->json([
                'message'=> 'No existe ningun comentario con ese id.'
    
            ], 404);

        }


    }

    // FUNCION PARA ELIMINAR COMENTARIOS
    public function delete (Request $request, $id){


        $comentarios = ComentarioTelecomunicaciones::find($id);


        if($comentarios){
            $comentarios->delete();

            return response()->json([
                'message'=> 'El comentario se ha eliminado satisfactoriamente'
            ]);
        }
        else{
            return response()->json([
                'message'=> 'No existe ninguna comentario con ese id.'
    
            ], 404);

        }


    }
}
