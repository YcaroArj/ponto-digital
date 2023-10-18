<?php

namespace App\Http\Controllers\local\central;

use App\Http\Controllers\local\AbstractBaseController;
use App\Models\Horario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GetTimeController extends AbstractBaseController
{
    protected $id;
    protected $getDay;
    protected $getTime;
    protected $dayQuery;
    protected $CreateEntry;
    protected $warningMessage;
    protected $dangerMessage;
    protected $dangerLunchMessage;
    protected $dangerReturnLunchMessage;
    protected $dangerExitMessage;
    protected $successMessage;

    public function __construct()
    {
        date_default_timezone_set('America/Sao_Paulo');
        parent::__construct();
        $this->pagesPath = 'pages.central.bater_ponto.lista';
        $this->getDay = date('Y:m:d');
        $this->getTime = date('H:i:s');
        $this->warningMessage = 'Horário já cadastrado!!';
        $this->dangerMessage = 'Erro Ao inserir Horário: Horário de entrada não preenchido!!';
        $this->dangerReturnLunchMessage = 'Erro Ao inserir Horário: Horário de Almoço não preenchido!!';
        $this->successMessage = 'Horário inserido com Sucesso!!';
    }

    public function getEntryTime()
    {
        $id = Auth::id();

        $dayQueryByID = DB::select("SELECT dia FROM horarios WHERE dia = '$this->getDay' AND userid = '$id'");

        $createEntry = array(
            'userid' => $id,
            'dia' => $this->getDay,
            'entrada' => $this->getTime
        );

        if ($dayQueryByID == true) {
            return redirect()->back()->with('warning', $this->warningMessage);
        } else {
            Horario::create($createEntry);
        }
        return redirect()->back()->with('success', $this->successMessage);
    }


    public function getLunchTime()
    {
        $id = Auth::id();

        $dayQuery = DB::select("SELECT dia FROM horarios WHERE dia = '$this->getDay' AND userid = '$id'");

        if ($dayQuery == true) {

            $timeQuery = DB::select("SELECT saidaAlmoco FROM horarios WHERE saidaAlmoco is null AND dia = '$this->getDay' AND entrada is not null");

            if ($timeQuery) {
                DB::table('horarios')
                    ->where('dia', $this->getDay)
                    ->where('userid', $id)
                    ->update(['saidaAlmoco' => $this->getTime]);
            } else {
                return redirect()->back()->with('warning', $this->warningMessage);
            }
        } else {
            return redirect()->back()->with('danger', $this->dangerMessage);
        }
        return redirect()->back()->with('success', $this->successMessage);
    }

    public function getReturnTime()
    {
        $id = Auth::id();

        $dayQuery = DB::select("SELECT dia FROM horarios WHERE dia = '$this->getDay' AND userid = '$id'");

        if ($dayQuery) {

            $timeQuery = DB::select("SELECT retornoAlmoco FROM horarios WHERE retornoAlmoco is null AND dia = '$this->getDay' AND saidaAlmoco is not null");

            if ($timeQuery) {
                DB::table('horarios')
                    ->where('dia', $this->getDay)
                    ->where('userid', $id)
                    ->update(['retornoAlmoco' => $this->getTime]);
            } else {
                return redirect()->back()->with('warning', $this->warningMessage);
            }
        } else {
            return redirect()->back()->with('danger', $this->dangerReturnLunchMessage);
        }
        return redirect()->back()->with('success', $this->successMessage);
    }

    public function GetExit()
    {
        $id = Auth::id();

        $dayQuery = DB::select("SELECT dia FROM horarios WHERE dia = '$this->getDay' AND userid = '$id'");

        if ($dayQuery) {

            $timeQuery = DB::select("SELECT saida FROM horarios WHERE saida is null AND dia = '$this->getDay' AND retornoAlmoco is not null");

            if ($timeQuery) {
                DB::table('horarios')
                    ->where('dia', $this->getDay)
                    ->where('userid', $id)
                    ->update(['saida' => $this->getTime]);
            } else {
                return redirect()->back()->with('warning', $this->warningMessage);
            }
        } else {
            return redirect()->back()->with('danger', $this->dangerMessage);
        }
        return redirect()->back()->with('success', $this->successMessage);
    }
}
