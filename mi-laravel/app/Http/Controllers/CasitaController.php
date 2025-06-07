<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CasitaController extends Controller
{
    // Problema 1: Maullido Misterioso 
    public function descifrarMaullidoMisterioso(Request $request)
    {
        
    }

    // Problema 2: Secuencia de Siesta Felina
    public function longitudSiesta(Request $request)
    {
        $collares = $request->input('collares');
        $set = array_flip($collares);
        $maxLongitud = 0;

        foreach ($collares as $num) {
            if (!isset($set[$num - 1])) {
                $actual = $num;
                $longitud = 1;

                while (isset($set[$actual + 1])) {
                    $actual++;
                    $longitud++;
                }

                $maxLongitud = max($maxLongitud, $longitud);
            }
        }

        return response()->json([
            'message' => 'Secuencia calculada correctamente',
            'longitud' => $maxLongitud,
        ]);
    }

    // ✅ Problema 3: Descifrando el Maullido Secreto
    public function descifrarMaullido(Request $request)
    {
        $maullido = $request->input('maullido');
        $diccionario = array_flip($request->input('diccionarioFelino'));
        $memo = [];

        function backtrack($s, $dict, &$memo)
        {
            if (isset($memo[$s])) return $memo[$s];
            if ($s === '') return [''];

            $res = [];

            for ($i = 1; $i <= strlen($s); $i++) {
                $prefix = substr($s, 0, $i);

                if (isset($dict[$prefix])) {
                    $rest = substr($s, $i);
                    $subFrases = backtrack($rest, $dict, $memo);

                    foreach ($subFrases as $frase) {
                        $res[] = $frase === '' ? $prefix : $prefix . ' ' . $frase;
                    }
                }
            }

            return $memo[$s] = $res;
        }

        $resultados = backtrack($maullido, $diccionario, $memo);

        return response()->json([
            'message' => 'Frases posibles generadas correctamente',
            'frases' => $resultados
        ]);
    }
}
