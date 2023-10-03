<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CadastrarHorarioController extends Controller
{
    public function registrarEntrada()
    {
        date_default_timezone_set('America/Sao_Paulo');
        $id = Auth::id();
        $dia = date('Y:m:d');
        $horaNow = date('H:i:s');
        $hora = array(
            'userid' => $id,
            'dia' => $dia,
            'entrada' => $horaNow
        );

        $diaAtual = DB::select("SELECT dia FROM horarios WHERE dia = '$dia' AND userid = '$id'");
        if ($diaAtual) {
        } else {
            Horario::create($hora);
        }
        return redirect()->back();
    }

    public function registrarSaidaAlmoco()
    {
        date_default_timezone_set('America/Sao_Paulo');
        $id = Auth::id();
        $dia = date('Y:m:d');
        $horaNow = date('H:i:s');

        $diaAtual = DB::select("SELECT dia FROM horarios WHERE dia = '$dia'");
        if ($diaAtual) {
            $horaCadastrada = DB::select("SELECT saidaAlmoco FROM horarios WHERE saidaAlmoco is null AND dia = '$dia' AND userid = '$id'");
            if ($horaCadastrada) {
                DB::table('horarios')
                    ->where('dia', $dia)
                    ->where('userid', $id)
                    ->update(['saidaAlmoco' => $horaNow]);
            } else {
                return redirect()->back();
            }
        } else {
        }

        return redirect()->back();
    }

    public function registrarRetornoAlmoco()
    {
        date_default_timezone_set('America/Sao_Paulo');
        $id = Auth::id();
        $dia = date('Y:m:d');
        $horaNow = date('H:i:s');

        $diaAtual = DB::select("SELECT dia FROM horarios WHERE dia = '$dia'");
        if ($diaAtual) {
            $horaCadastrada = DB::select("SELECT retornoAlmoco FROM horarios WHERE retornoAlmoco is null AND dia = '$dia' AND userid = '$id'");
            if ($horaCadastrada) {
                DB::table('horarios')
                    ->where('dia', $dia)
                    ->where('userid', $id)
                    ->update(['retornoAlmoco' => $horaNow]);
            } else {
                return redirect()->back();
            }
        } else {
        }

        return redirect()->back();
    }

    public function registrarSaida()
    {
        date_default_timezone_set('America/Sao_Paulo');
        $id = Auth::id();
        $dia = date('Y:m:d');
        $horaNow = date('H:i:s');

        $diaAtual = DB::select("SELECT dia FROM horarios WHERE dia = '$dia'");
        if ($diaAtual) {
            $horaCadastrada = DB::select("SELECT saida FROM horarios WHERE saida is null AND dia = '$dia' AND userid = '$id'");
            if ($horaCadastrada) {
                DB::table('horarios')
                    ->where('dia', $dia)
                    ->where('userid', $id)
                    ->update(['saida' => $horaNow]);
            } else {
                return redirect()->back();
            }
        } else {
        }

        return redirect()->back();
    }
}
