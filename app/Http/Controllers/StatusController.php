<?php

namespace App\Http\Controllers;

use App\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index(){
        $statuses = Status::all();
        return $statuses;
    }

    public function create(){
        return view('statuses.create');
    }

    public function store(Request $request){

        $newStatus = new Status();
        $newStatus->user_id = 1;
        $newStatus->status = $request->input('status');
        $newStatus->lat = $request->input('lat');
        $newStatus->lng = $request->input('lng');
        $newStatus->save();

        return redirect(action('StatusController@index'));
    }
}
