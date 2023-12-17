<?php

namespace App\Http\Controllers;

use App\Models\Areas;
use App\Models\Rooms;
use App\Models\Shifts;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShiftsController extends Controller
{
    public function request(){
        $areas = Areas::all();
        return view('shifts.request', compact(['areas']));
    }

    public function areas(Request $request){
        $identification = $request->identification;
        return view('shifts.areas', compact(['identification']));
    }

    public function save(Request $request){

        $totalToday = Shifts::where('area', $request->area)->whereDate('created_at', Carbon::today())->count();

        $shift = Shifts::create($request->all());
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
        $shifts = Shifts::where('room', $room)->whereDate('created_at', Carbon::today())->orderBy('id','DESC')->limit(5)->get();
        return view('shifts.screen', compact(['shifts','room']));
    }
}
