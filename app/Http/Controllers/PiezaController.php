<?php

namespace App\Http\Controllers;

use App\Models\Pieza;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class PiezaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    #Metodo para recuperar la informacion de la db, mandar los datos en .json
    #y abrir la vista
    public function getPieza($id) {
        $piezas = Pieza::where('part_status', $id)
                        ->orderBy('created_at', 'desc')
                        ->paginate(50);
        $user = User::find($id);
        return view('pieza', compact('piezas', 'user'));
    }


    public function getPiezaVizualizador() {
        $piezas = Pieza::orderBy('created_at', 'desc')->paginate(50);
        return view('piezaVizualizador', compact('piezas'));
    }

    public function filtrarporFecha(Request $request) {
        $fecha = $request->input('selected_date');
        $piezas = Pieza::whereDate('created_at', $fecha)
                       ->orderBy('created_at', 'desc')
                       ->paginate(10000000000000);
        return view('piezaVizualizador', compact('piezas'));
    }


    public function updatePieza (Request $request,$id){
        try{
        $pieza = Pieza::findOrFail($id);
        $pieza -> serial_number = $request->UpSerialNumber;
        #$pieza -> part_status = $request->UpPartStatus;
        //actaulizar
        $pieza->save();
        //return $request; #regresa un token en xml
        return back() -> with("Correcto","Pieza modificada correctamente");
        }catch (QueryException $e){
            if($e ->errorInfo[1]==1062){
                return back() -> with("Error","Error, la pieza ya existe");
            }
            return back() -> with("Error","Error al modificar la pieza");
        }
    }

    public function createPieza(Request $request,$id)
    {
        try {
            $request->validate([
                'txtSerialNumber' => 'required|string',
            ]);

            $pieza = new Pieza();
            $pieza -> serial_number = $request->txtSerialNumber;
            $pieza ->part_status = $id;
            $pieza->save(); //Guardamos

            return back()->with("Correcto", "pieza agregado correctamente");

        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return back()->with("Error", "ERROR - Esa pieza ya existe");
            }
            // Cualquier Otro error
            return back()->with("Error", "Error al agregar la pieza");
        }
    }


public function deletePieza($id)
{
//Hay que recibir como parametro el id del registro a eliminar
    try {
		// Buscamos la pieza
        $pieza = Pieza::findOrFail($id);
        // Se elimina
        $pieza->delete();

        return back()->with("Correcto", "Se ha eliminado la pieza correctamente");
    } catch (QueryException $e) {
        // Cualquier  error
        return back()->with("Incorrecto", "Error al eliminar la pieza");
    }
}
}
