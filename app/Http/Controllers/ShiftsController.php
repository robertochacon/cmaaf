<?php

namespace App\Http\Controllers;

use App\Models\Areas;
use App\Models\Shifts;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShiftsController extends Controller
{
    public function request(){
        $areas = Areas::all();
        return view('shifts.request', compact(['areas']));
    }

    public function save(Request $request){

        $totalToday = Shifts::whereDate('created_at', Carbon::today())->count();

        $shift = Shifts::create($request->all());
        $shift->code = $request->acronym.'-'.($totalToday+1);
        $shift->save();

        $date['date'] = Carbon::now()->format('d-m-Y');
        $date['hour'] = Carbon::now()->format('H:i:m');

        return view('shifts.done', compact(['shift','date']));
    }

    public function screen(){
        $shifts = Shifts::whereDate('created_at', Carbon::today())->orderBy('id','DESC')->limit(5)->get();
        return view('shifts.screen', compact(['shifts']));
    }
}
