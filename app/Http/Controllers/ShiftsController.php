<?php

namespace App\Http\Controllers;

use App\Models\Areas;
use App\Models\Shifts;
use Illuminate\Http\Request;

class ShiftsController extends Controller
{
    public function request(){
        $areas = Areas::all();
        return view('shifts.request', compact(['areas']));
    }

    public function save(Request $request){
        $request = Shifts::create($request->all());
        $request->save();
        return view('shifts.done', compact(['request']));
    }
}
