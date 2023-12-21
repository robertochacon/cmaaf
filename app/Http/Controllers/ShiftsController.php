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
        return view('shifts.request');
    }

    public function areas(Request $request){
        $areas = Areas::all();
        $identification = $request->identification;
        return view('shifts.areas', compact(['identification','areas']));
    }

    public function save(Request $request){

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
        $shift->save();

        $date['date'] = Carbon::now()->format('d-m-Y');
        $date['hour'] = Carbon::now()->format('H:i:m');

        return view('shifts.done', compact(['shift','date']));
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
