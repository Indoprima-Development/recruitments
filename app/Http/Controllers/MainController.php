<?php

namespace App\Http\Controllers;

use App\Models\Jobtitle;
use App\Models\Ptkfield;
use App\Models\Ptkform;
use App\Models\Ptkformtransaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;

class MainController extends Controller
{
    public function index()
    {
        $date = date("Y-m-d");

        $jobs = Ptkform::where("status", 1)
            ->whereDate('date_open_vacancy', '<=', $date . ' 00:00')
            ->whereDate('date_closed_vacancy', '>=', $date . ' 23:59')
            ->get()->take(4);

        return view('index',compact("jobs"));
    }

    public function vacancy()
    {
        //get date today
        $date = date("Y-m-d");

        //find from ptk which has status = 1
        $jobs = Ptkform::where("status", 1)
            ->whereDate('date_open_vacancy', '<=', $date . ' 00:00')
            ->whereDate('date_closed_vacancy', '>=', $date . ' 23:59')
            ->get();

        return view('vacancy', compact("jobs"));
    }

    public function showVacancy($id)
    {
        $id = Crypt::decryptString($id);
        $ptkform = Ptkform::findOrFail($id);

        $isApplied = false;
        if (Auth::check()) {
            $trs = Ptkformtransaction::where('ptkform_id', $id)
                ->where('user_id', Auth::user()->id)
                ->first();

            if (!empty($trs)) {
                $isApplied = true;
            }
        }

        $jobtitle = Jobtitle::findOrFail($ptkform->jobtitle_id);
        $ptkfields = Ptkfield::where('ptkform_id',$id)->get();

        return view('ptkforms.show', compact('ptkform', 'isApplied', 'jobtitle','ptkfields'));
    }

    public function konfirmation(Request $request){
        User::where('active_token', $request->input('token'))->update([
            'is_active' => 1
        ]);

        Alert::success('Success', 'Akun berhasil diaktifasi');
        return redirect('auth/login');
    }
}
