<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Datadiri;
use App\Http\Requests\DatadiriRequest;
use App\Models\Datadetail;
use App\Models\Datakeluarga;
use App\Models\Datakemampuan;
use App\Models\Datakesehatan;
use App\Models\Dataolahraga;
use App\Models\Dataorganisasi;
use App\Models\Datapendidikanformal;
use App\Models\Datapendidikannonformal;
use App\Models\Datapengalamankerja;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DatadirisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $datadiris = Datadiri::all();
        return view('datadiris.index', ['datadiris' => $datadiris]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('datadiris.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  DatadiriRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DatadiriRequest $request)
    {
        $dataRequest = [];
        $dataRequest["user_id"] = Auth::user()->id;
        $dataRequest["name"] = $request->input('name');
        $dataRequest["gender"] = $request->input('gender');
        $dataRequest["tempat_lahir"] = $request->input('tempat_lahir');
        $dataRequest["tanggal_lahir"] = $request->input('tanggal_lahir');
        $dataRequest["agama"] = $request->input('agama');
        $dataRequest["alamat"] = $request->input('alamat');
        $dataRequest["no_hp"] = $request->input('no_hp');
        $dataRequest["no_wa"] = $request->input('no_wa');
        $dataRequest["status_rumah"] = $request->input('status_rumah');
        $dataRequest["golongan_darah"] = $request->input('golongan_darah');
        $dataRequest["tinggi_badan"] = $request->input('tinggi_badan');
        $dataRequest["berat_badan"] = $request->input('berat_badan');
        $dataRequest["ktp"] = $request->input('ktp');
        $dataRequest["provinces"] = $request->input('provinces');
        $dataRequest["cities"] = $request->input('cities');

        $kendaraan = [];
        if ($request->input('kendaraan') != null) {
            $kendaraan = $request->input('kendaraan');
        }

        $sim = [];
        if ($request->input('sim') != null) {
            $sim = $request->input('sim');
        }

        $dataRequest["kendaraan"] = json_encode($kendaraan);
        $dataRequest["sim"] = json_encode($sim);

        $datadiri = Datadiri::where('user_id', Auth::user()->id)->first();
        if (empty($datadiri)) {
            Datadiri::create($dataRequest);
        } else {
            $datadiri->update($dataRequest);
        }

        return redirect('forms?section=pendidikan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $datadiri = Datadiri::findOrFail($id);
        return view('datadiris.show', ['datadiri' => $datadiri]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $datadiri = Datadiri::findOrFail($id);
        return view('datadiris.edit', ['datadiri' => $datadiri]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DatadiriRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(DatadiriRequest $request, $id)
    {
        $datadiri = Datadiri::findOrFail($id);
        $datadiri->user_id = $request->input('user_id');
        $datadiri->name = $request->input('name');
        $datadiri->gender = $request->input('gender');
        $datadiri->tempat_lahir = $request->input('tempat_lahir');
        $datadiri->tanggal_lahir = $request->input('tanggal_lahir');
        $datadiri->agama = $request->input('agama');
        $datadiri->alamat = $request->input('alamat');
        $datadiri->no_hp = $request->input('no_hp');
        $datadiri->no_wa = $request->input('no_wa');
        $datadiri->status_rumah = $request->input('status_rumah');
        $datadiri->golongan_darah = $request->input('golongan_darah');
        $datadiri->tinggi_badan = $request->input('tinggi_badan');
        $datadiri->berat_badan = $request->input('berat_badan');
        $datadiri->ktp = $request->input('ktp');
        $datadiri->kendaraan = $request->input('kendaraan');
        $datadiri->sim = $request->input('sim');
        $datadiri->ekspektasi_gaji = $request->input('ekspektasi_gaji');
        $datadiri->fasilitas_harapan = $request->input('fasilitas_harapan');
        $datadiri->kesediaan_penempatan = $request->input('kesediaan_penempatan');
        $datadiri->kesediaan_mulai_bekerja = $request->input('kesediaan_mulai_bekerja');
        $datadiri->image_jabatan_terakhir = $request->input('image_jabatan_terakhir');
        $datadiri->keterangan_jabatan_terakhir = $request->input('keterangan_jabatan_terakhir');
        $datadiri->provinces = $request->input('provinces');
        $datadiri->cities = $request->input('cities');
        $datadiri->save();

        return to_route('datadiris.index');
    }

    public function pernyataan(Request $request, $id)
    {
        $datadiri = Datadiri::findOrFail(Auth::user()->id);
        $datadiri->ekspektasi_gaji = $request->input('ekspektasi_gaji');
        $datadiri->fasilitas_harapan = $request->input('fasilitas_harapan');
        $datadiri->kesediaan_penempatan = $request->input('kesediaan_penempatan');
        $datadiri->kesediaan_mulai_bekerja = $request->input('kesediaan_mulai_bekerja');
        $datadiri->keterangan_jabatan_terakhir = $request->input('keterangan_jabatan_terakhir');

        if (!empty($request->image_jabatan_terakhir)) {
            $filename = $id . ".png";
            $pathUpload = "jabatan";
            UploadFile($request->image_jabatan_terakhir, $pathUpload, $filename);
            $datadiri->image_jabatan_terakhir = $pathUpload."/"."$filename";
        }
        $datadiri->save();

        if ($request->input('ekspektasi_gaji') == "" || $request->input('fasilitas_harapan') == "" || $request->input('kesediaan_penempatan') == "" || $request->input('kesediaan_mulai_bekerja') == "" || $request->input('keterangan_jabatan_terakhir') == "") {
            return redirect('forms?section=pernyataan');
        }

        return redirect('opening-jobs');
    }

    public function photo(Request $request)
    {
        $datadiri = User::findOrFail(Auth::user()->id);

        if (!empty($request->photo)) {
            $filename = $datadiri->id . ".png";
            $pathUpload = "photo";
            UploadFile($request->photo, $pathUpload, $filename);
            $datadiri->photo = $pathUpload."/"."$filename";
        }
        $datadiri->save();

        return redirect('forms');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $datadiri = Datadiri::findOrFail($id);
        $datadiri->delete();

        return to_route('datadiris.index');
    }

    public function dataAllUsers(){
        $users = Datadiri::select("*")->get();
        return view('datadiris.users',compact('users'));
    }

    public function dataUserById($id){
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
}
