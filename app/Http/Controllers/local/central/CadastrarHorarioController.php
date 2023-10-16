<?php

namespace App\Http\Controllers\local\central;

use App\Http\Controllers\local\AbstractBaseController;
use App\Models\Horario;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CadastrarHorarioController extends AbstractBaseController
{
    protected $id;
    protected $dia;
    protected $horaNow;
    protected $diaAtual;
    protected $hora;

    public function __construct()
    {
        date_default_timezone_set('America/Sao_Paulo');
        parent::__construct();
        $this->entity = User::class;
        $this->pagesPath = 'pages.central.bater_ponto.lista';
        $this->dia = date('Y:m:d');
        $this->horaNow = date('H:i:s');
        $this->diaAtual = DB::select("SELECT dia FROM horarios WHERE dia = '$this->dia' AND userid = '$this->id'");
        $this->hora = [
            'userid' => $this->id,
            'dia' => $this->dia,
            'entrada' => $this->horaNow
        ];
    }

    public function registrarEntrada()
    {
        // if ($this->diaAtual) {
        // } else {
        //     Horario::create($this->hora);
        // }

        dd($this->entity);
        return redirect()->back();
    }

    public function registrarSaidaAlmoco()
    {
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
