<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datadiri;
use App\Models\Datakesehatan;
use App\Models\Datapendidikanformal;
use App\Models\Datapendidikannonformal;
use App\Models\Datakeluarga;
use App\Models\Datapengalamankerja;
use App\Models\Datakemampuan;
use App\Models\Dataolahraga;
use App\Models\Datadetail;

use Illuminate\Support\Facades\Auth;

class FormsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datadiri = Datadiri::where("user_id",Auth::user()->id)->first();
        $data["kesehatan"] = Datakesehatan::where("user_id",Auth::user()->id)->get();
        $data["pendidikanformal"] = Datapendidikanformal::where("user_id",Auth::user()->id)->get();
        $data["pendidikannonformal"] = Datapendidikannonformal::where("user_id",Auth::user()->id)->get();
        $data["keluarga"] = Datakeluarga::where("user_id",Auth::user()->id)->get();
        $data["pengalamankerja"] = Datapengalamankerja::where("user_id",Auth::user()->id)->get();
        $data["kemampuan"] = Datakemampuan::where("user_id",Auth::user()->id)->get();
        $data["olahraga"] = Dataolahraga::where("user_id",Auth::user()->id)->get();
        $data["detail"] = Datadetail::where("user_id",Auth::user()->id)->get();

        return view("forms.index",compact("data","datadiri"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
