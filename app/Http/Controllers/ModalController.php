<?php

namespace App\Http\Controllers;

use App\Status;
use Illuminate\Http\Request;

class ModalController extends Controller
{
    public function index(){
        $statuses = Status::count();

        return view('modal', ['statuses' => $statuses]);
    }
}
