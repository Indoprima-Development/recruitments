<?php

namespace App\Http\Controllers;

use App\Models\Jobtitle;
use App\Models\Ptkfield;
use App\Models\Ptkform;
use App\Models\Ptkformtransaction;
use App\Models\SavedJob;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use RealRashid\SweetAlert\Facades\Alert;

class MainController extends Controller
{
    /**
     * TTL for the public vacancy listing/detail caches. Kept short since
     * PtkformsController also actively busts these on create/update/close,
     * this just bounds staleness if a bust is ever missed.
     */
    private const VACANCY_CACHE_TTL_MINUTES = 10;

    public function index()
    {
        $date = date("Y-m-d");

        $jobs = Cache::remember('public_vacancies_home', now()->addMinutes(self::VACANCY_CACHE_TTL_MINUTES), function () use ($date) {
            return Ptkform::with(['jobtitle', 'division', 'education'])
                ->where("status", 1)
                ->whereDate('date_open_vacancy', '<=', $date)
                ->whereDate('date_closed_vacancy', '>=', $date)
                ->limit(4)
                ->get();
        });

        return view('index',compact("jobs"));
    }

    public function vacancy()
    {
        //get date today
        $date = date("Y-m-d");

        $jobs = Cache::remember('public_vacancies_all', now()->addMinutes(self::VACANCY_CACHE_TTL_MINUTES), function () use ($date) {
            //find from ptk which has status = 1
            return Ptkform::with(['jobtitle', 'division', 'education', 'location'])
                ->where("status", 1)
                ->whereDate('date_open_vacancy', '<=', $date)
                ->whereDate('date_closed_vacancy', '>=', $date)
                ->orderBy('id', 'desc')
                ->get();
        });

        return view('vacancy', compact("jobs"));
    }

    public function showVacancy($hash)
    {
        $id = DecodeVacancyId($hash);
        abort_if($id === null, 404);

        // Only the vacancy/jobtitle/fields lookup is cached: it's the same
        // for every visitor. isApplied/isSaved depend on the logged-in user
        // and are always computed fresh below.
        $cached = Cache::remember("public_vacancy_detail_{$id}", now()->addMinutes(self::VACANCY_CACHE_TTL_MINUTES), function () use ($id) {
            $ptkform = Ptkform::findOrFail($id);
            $jobtitle = Jobtitle::findOrFail($ptkform->jobtitle_id);
            $ptkfields = Ptkfield::where('ptkform_id', $id)->get();

            return compact('ptkform', 'jobtitle', 'ptkfields');
        });
        $ptkform = $cached['ptkform'];
        $jobtitle = $cached['jobtitle'];
        $ptkfields = $cached['ptkfields'];

        $isApplied = false;
        $isSaved = false;

        if (Auth::check()) {
            $trs = Ptkformtransaction::where('ptkform_id', $id)
                ->where('user_id', Auth::user()->id)
                ->first();

            if (!empty($trs)) {
                $isApplied = true;
            }

            // Check if job is saved
            $savedJob = SavedJob::where('ptkform_id', $id)
                ->where('user_id', Auth::user()->id)
                ->first();

            if (!empty($savedJob)) {
                $isSaved = true;
            }
        }

        return view('ptkforms.show', compact('ptkform', 'isApplied', 'isSaved', 'jobtitle','ptkfields'));
    }

    public function konfirmation(Request $request){
        User::where('active_token', $request->input('token'))->update([
            'is_active' => 1
        ]);

        Alert::success('Success', 'Akun berhasil diaktifasi');
        return redirect('auth/login');
    }
}
