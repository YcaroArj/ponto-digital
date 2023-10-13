<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TesteController extends Controller
{
    public function calcularHorasExtras(Request $request)
    {
        $id = Auth::id();// Pega o ID do usuário logado
        $Mes = date('m');

        // Calcula as horas extras
        $horarios = DB::table('horarios')
            ->where('userid',$id)
            ->whereMonth('dia', $Mes)
            ->get();

        $totalHorasExtras = 0;

        foreach ($horarios as $horario) {
            // Calcule as horas extras para cada registro de horário, conforme sua lógica específica
            // Suponha que você tenha campos 'entrada' e 'saida', você pode usar a função diffInHours
            $entrada = Carbon::parse($horario->entrada);
            $saida = Carbon::parse($horario->saida);
            $horasTrabalhadas = $entrada->diffInHours($saida);

            // Aqui você deve aplicar sua lógica para calcular horas extras
            // Exemplo: Se horasTrabalhadas > 8, então horasExtras = horasTrabalhadas - 8
            $horasExtras = max($horasTrabalhadas - 5, 0);

            $totalHorasExtras = $totalHorasExtras + $horasExtras;
        }

        echo $totalHorasExtras;
    }
}
