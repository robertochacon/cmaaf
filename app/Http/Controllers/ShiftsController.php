<?php

namespace App\Http\Controllers;

use App\Models\Areas;
use App\Models\Rooms;
use App\Models\Shifts;
use App\Services\Jce;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShiftsController extends Controller
{
    public function request(){
        $areas = Areas::all();
        return view('shifts.request', compact(['areas']));
    }

    public function areas(Request $request){
        $areas = Areas::all();
        $identification = $request->identification;
        return view('shifts.areas', compact(['identification','areas']));
    }

    public function save(Request $request){
        try{

            $totalToday = Shifts::where('area', $request->area)->whereDate('created_at', Carbon::today())->count();

            $jce = (new Jce())->getPerson(Str::remove('-', $request->identification));

            $name = null;

            if (isset($jce['nombre'])) {
                $name = $jce['nombre'].' '.$jce['apellidos'];
            }

            $shift = Shifts::create($request->all());
            $shift->identification = $request->identification;
            $shift->patient_name = $name ?? null;
            $shift->code = $request->acronym.'-'.($totalToday+1);
            $shift->insurance = $request->insurance;
            $shift->save();

            $area = match(true){
                $request->acronym == "LAB" => "Laboratorio",
                $request->acronym == "IMA" => "Imágenes",
                $request->acronym == "CON" => "Consultas",
                $request->acronym == "RES" => "Resultados",
            };

            $date['date'] = Carbon::now()->format('d-m-Y');
            date_default_timezone_set('America/Santo_Domingo');
            $date['hour'] = date("h:i:s a");

            // return view('shifts.done', compact(['shift','area','date']));

            return response()->json(['shift' => $shift, 'area' => $area, 'date' => $date, 'status' => true]);


        }catch (\Throwable $th) {
            return response()->json(['status' => false]);
        }
    }

    public function roomScreens(){
        $rooms = Rooms::orderBy('id','DESC')->get();
        return view('rooms.screen', compact(['rooms']));
    }

    public function screen($room){
        $getRoom = Rooms::where('name',$room)->first();
        $images = $getRoom['images'];
        $areas = $getRoom['areas'];
        $shifts = Shifts::whereDate('created_at', Carbon::today())->whereIn('area', array_values($areas))->orderBy('id','DESC')->limit(5)->get();
        return view('shifts.screen', compact(['shifts','room','areas','images']));
    }
}
