<?php

namespace App\Http\Controllers;

use App\Models\Pieza;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PiezaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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

    public function filtrarporFechaEstados(Request $request,$id) {
        $fecha = $request->input('selected_date');
        $piezas = Pieza::where('part_status', $id)
                        ->whereDate('created_at', $fecha)
                       ->orderBy('created_at', 'desc')
                       ->paginate(10000000000000);
        $user = User::find($id);

        return view('pieza', compact('piezas', 'user'));

    }

    public function updatePieza(Request $request, $id){
        try{
            $pieza = Pieza::findOrFail($id);
            $pieza->serial_number = $request->UpSerialNumber;
            $pieza->save();
            return back()->with("Correcto","Pieza modificada correctamente");
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return back()->with("Error", "Error, la pieza ya existe");
            }
            return back()->with("Error", "Error al modificar la pieza");
        }
    }

    public function updatePartStatus(Request $request, $id)
    {
        try {
            $request->validate([
                'txtSerialNumber' => 'required|string',
            ]);

            // Encuentra la pieza por su serial_number
            $pieza = Pieza::where('serial_number', $request->txtSerialNumber)->first();

            // Si la pieza existe, actualiza el campo part_status
            if ($pieza) {
                $pieza->part_status = $id;
                $pieza->save();

                return back()->with("Correcto", "Estado de la pieza actualizado correctamente");
            } else {
                return back()->with("Error", "La pieza no existe");
            }
        } catch (QueryException $e) {
            return back()->with("Error", "Error al actualizar el estado de la pieza");
        }
    }



    public function deletePieza($id)
    {
        try {
            $pieza = Pieza::findOrFail($id);
            $pieza->delete();
            return back()->with("Correcto", "Se ha eliminado la pieza correctamente");
        } catch (QueryException $e) {
            return back()->with("Incorrecto", "Error al eliminar la pieza");
        }
    }

    public function printQr(Request $request)
    {
        $serialNumber = $request->input('serial_number');

        // Generar el código QR
        $qrCode = QrCode::format('png')->size(200)->generate($serialNumber);

        // Guardar el QR en el servidor
        $path = storage_path('app/public/qrcodes/' . $serialNumber . '.png');
        if (!file_exists(dirname($path))) {
            mkdir(dirname($path), 0755, true);
        }
        file_put_contents($path, $qrCode);

        // Enviar el QR a la impresora vía TCP
        $printerIP = '192.168.1.100'; // Cambia esto por la IP de tu impresora
        $printerPort = 9100; // Puerto de impresión típico

        $fp = fsockopen($printerIP, $printerPort, $errno, $errstr, 10);

        if (!$fp) {
            echo "Error: $errstr ($errno)\n";
        } else {
            fwrite($fp, file_get_contents($path));
            fclose($fp);
        }

        return back()->with('success', 'Código QR impreso correctamente.');
    }
}
