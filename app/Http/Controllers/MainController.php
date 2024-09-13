<?php

namespace App\Http\Controllers;

use App\Models\Jobtitle;
use App\Models\Ptkform;
use App\Models\Ptkformtransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function vacancy()
    {
        //get date today
        $date = date("Y-m-d");

        //find from ptk which has status = 1
        $jobs = Ptkform::where("status", 1)
            ->whereDate('date_open_vacancy', '<=', $date.' 00:00')
            ->whereDate('date_closed_vacancy', '>=', $date.' 23:59')
            ->get();

        return view('vacancy', compact("jobs"));
    }

    public function showVacancy($id)
    {
        $ptkform = Ptkform::findOrFail($id);
        $trs = Ptkformtransaction::where('ptkform_id',$id)
        ->where('user_id',Auth::user()->id)
        ->first();

        $jobtitle = Jobtitle::findOrFail($ptkform->jobtitle_id);

        $isApplied = false;
        if (!empty($trs)) {
            $isApplied = true;
        }

        return view('ptkforms.show', compact('ptkform','isApplied','jobtitle'));
    }
}
