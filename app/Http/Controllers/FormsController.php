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
use App\Models\Dataorganisasi;
use App\Models\Datapeminatan;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class FormsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datadiri = Datadiri::where("user_id",Auth::user()->id)->first();
        $datakesehatans = Datakesehatan::where("user_id",Auth::user()->id)->get();
        $datapendidikanformals = Datapendidikanformal::where("user_id",Auth::user()->id)->get();
        $datapendidikannonformals = Datapendidikannonformal::where("user_id",Auth::user()->id)->get();
        $datakeluargas = Datakeluarga::where("user_id",Auth::user()->id)->get();
        $datapengalamankerjas = Datapengalamankerja::where("user_id",Auth::user()->id)->get();
        $datakemampuans = Datakemampuan::where("user_id",Auth::user()->id)->get();
        $dataolahragas = Dataolahraga::where("user_id",Auth::user()->id)->get();
        $datadetails = Datadetail::where("user_id",Auth::user()->id)->get();
        $dataorganisasis = Dataorganisasi::where("user_id",Auth::user()->id)->get();
        $datapeminatans = Datapeminatan::where("user_id",Auth::user()->id)->get();

        return view("forms.index",compact("datadiri","datapendidikanformals","datapendidikannonformals","datakeluargas","datapengalamankerjas","datakemampuans","dataorganisasis","dataolahragas","datadetails","datakesehatans","datapeminatans"));
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
        $datadiri = Datadiri::where("user_id",$id)->first();
        $datakesehatans = Datakesehatan::where("user_id",$id)->get();
        $datapendidikanformals = Datapendidikanformal::where("user_id",$id)->get();
        $datapendidikannonformals = Datapendidikannonformal::where("user_id",$id)->get();
        $datakeluargas = Datakeluarga::where("user_id",$id)->get();
        $datapengalamankerjas = Datapengalamankerja::where("user_id",$id)->get();
        $datakemampuans = Datakemampuan::where("user_id",$id)->get();
        $dataolahragas = Dataolahraga::where("user_id",$id)->get();
        $datadetails = Datadetail::where("user_id",$id)->get();
        $dataorganisasis = Dataorganisasi::where("user_id",$id)->get();
        $users = User::find($id);

        return view("forms.show",compact("datadiri","datapendidikanformals","datapendidikannonformals","datakeluargas","datapengalamankerjas","datakemampuans","dataorganisasis","dataolahragas","datadetails","datakesehatans","users"));

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
