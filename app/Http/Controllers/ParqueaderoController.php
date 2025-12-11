<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Parqueadero;
use App\Models\EspacioParqueadero;
use Illuminate\Support\Facades\DB;

class ParqueaderoController extends Controller
{
    /**
     * --------------------------------------------------------------------
     * Generar Etiquetas para Espacios
     * --------------------------------------------------------------------
     * Crea códigos como: 1A, 2A, 3A, ... 1B, 2B, etc.
     * según las filas y los puestos por fila configurados.
     */
    public function generarEtiquetas(int $filas, int $puestosPorFila, string $letraInicio = 'A'): array
    {
        $labels = [];
        $start = strtoupper($letraInicio)[0];

        for ($f = 0; $f < $filas; $f++) {

            // Letra A, B, C...
            $letter = chr(ord($start) + $f);

            // Números 1, 2, 3...
            for ($n = 1; $n <= $puestosPorFila; $n++) {
                $labels[] = $n . $letter;
            }
        }

        return $labels;
    }

    /**
     * --------------------------------------------------------------------
     * Mostrar todos los parqueaderos
     * --------------------------------------------------------------------
     */
    public function index()
    {
        $parqueaderos = Parqueadero::all();
        return view('parqueaderos', compact('parqueaderos'));
    }

    /**
     * --------------------------------------------------------------------
     * Crear un nuevo parqueadero
     * --------------------------------------------------------------------
     * Valida los datos, crea el parqueadero, genera los espacios
     * y recalcula el total de espacios disponibles.
     */
public function store(Request $request)
{
    \Log::info('DEBUG-STORE', ['request' => $request->all()]);

    // 🔥 Normalizar latitud y longitud (convertir '−74.0468' a '-74.0468')
    $request->merge([
        'latitud' => preg_replace('/[^0-9\.\-]/', '', $request->latitud),
        'longitud' => preg_replace('/[^0-9\.\-]/', '', $request->longitud),
    ]);

    try {

        // ✔️ Validación segura
        $data = $request->validate([
            'nombre' => 'required|string|max:100',
            'direccion' => 'nullable|string|max:255',
            'descripcion' => 'nullable|string',
            'espacios_disponibles' => 'required|integer|min:0',
            'latitud' => 'required|numeric',
            'longitud' => 'required|numeric',
            'filas' => 'required|integer|min:1',
            'puestos_por_fila' => 'required|integer|min:1',
            'letra_inicio' => 'nullable|string|size:1'
        ]);

        // Obtener valores
        $filas = (int) $data['filas'];
        $puestosPorFila = (int) $data['puestos_por_fila'];
        $letraInicio = $data['letra_inicio'] ?? 'A';

        DB::transaction(function() use ($data, $filas, $puestosPorFila, $letraInicio) {

            // Crear parqueadero
            $parqueadero = Parqueadero::create([
                'nombre' => $data['nombre'],
                'direccion' => $data['direccion'] ?? null,
                'descripcion' => $data['descripcion'] ?? null,
                'espacios_disponibles' => $data['espacios_disponibles'],
                'latitud' => $data['latitud'],
                'longitud' => $data['longitud'],
            ]);

            // Generar etiquetas
            $labels = $this->generarEtiquetas($filas, $puestosPorFila, $letraInicio);

            // Crear espacios
            foreach ($labels as $label) {
                EspacioParqueadero::create([
                    'numero' => $label,
                    'tipo' => 'Estándar',
                    'parqueadero_id' => $parqueadero->id,
                ]);
            }

            // Ajustar contador
            $parqueadero->espacios_disponibles = count($labels);
            $parqueadero->save();
        });

        return redirect()
            ->route('parqueaderos.index')
            ->with('success', 'Parqueadero y espacios creados correctamente.');

    } catch (\Throwable $e) {
        \Log::error('STORE-ERROR', [
            'message' => $e->getMessage(),
            'line' => $e->getLine(),
            'file' => $e->getFile(),
        ]);

        return back()->with('error', 'Hubo un error al guardar.');
    }
}



    /**
     * --------------------------------------------------------------------
     * Editar un parqueadero existente
     * --------------------------------------------------------------------
     */
    public function update(Request $request, $id)
    {
        $parqueadero = Parqueadero::findOrFail($id);

        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'direccion' => 'nullable|string|max:255',
            'descripcion' => 'nullable|string',
            'espacios_disponibles' => 'required|integer|min:0',
            'latitud' => 'required|numeric',
            'longitud' => 'required|numeric',
            'filas' => 'required|integer|min:1',
            'puestos_por_fila' => 'required|integer|min:1',
            'letra_inicio' => 'required|string|max:1',
        ]);

        $parqueadero->update($validated);

        return back()->with('success', 'Parqueadero actualizado correctamente.');
    }

    /**
     * --------------------------------------------------------------------
     * Eliminar un parqueadero
     * --------------------------------------------------------------------
     */
    public function destroy($id)
    {
        Parqueadero::destroy($id);
        return back()->with('success', 'Parqueadero eliminado.');
    }

}
