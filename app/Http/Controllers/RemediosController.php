<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Remedios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class RemediosController extends Controller
{
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|string|max:255',
            'nome' => 'required|string|max:255',
            'horario' => 'required|string|max:255',
            'dia' => 'required|string|max:255',
            'descricao' => 'nullable|string|max:255',
            'key' => 'nullable|string|max:255',
        ]);

        try {
            $remedio = new Remedios($validatedData);

            $remedio->save();

            return response()->json(['message' => 'Remédio criado com sucesso'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao criar o remédio: ' . $e->getMessage()], 500);
        }
    }

    public function read(Request $request)
    {
            $user = $request->input('id');
        try {

            $remedios = DB::table('remedios')->where('id', $user)->get();
            $remediosDecoded = json_decode($remedios, true);

            return response()->json($remediosDecoded, 200);
        }
        catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao buscar os remédios: ' . $e->getMessage()], 500);
        }
    }
}
