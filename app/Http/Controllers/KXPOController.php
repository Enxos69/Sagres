<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KXPOController extends Controller
{
    public function calcolaKXPO(Request $request)
    {
        /**
         * validazione dei campi imputati
         */
        $request->validate([
            'length' => 'required|numeric|min:0',
            'T_sc' => 'required|numeric|min:0',
            'verticalShift' => 'required|numeric|min:0'
        ]);

        $length = $request->input('length');
        $T_sc = $request->input('T_sc');
        $verticalShift = $request->input('verticalShift');
        $CG_h = $length > 200 ? 15 : 10;
        $angularAccelerationPitch = 0.105;
        $asv = 0.5;
        $g = 9.81;

        // Calcolo del Fattore KXPO
        $kxpo = sqrt(pow($asv, 2) * $g + $angularAccelerationPitch * ($verticalShift + $CG_h - $T_sc)) / $g;

        return response()->json(['kxpo' => number_format($kxpo, 4)]);
    }
}
