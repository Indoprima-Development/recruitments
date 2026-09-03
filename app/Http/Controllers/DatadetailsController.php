<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Datadetail;
use App\Http\Requests\DatadetailRequest;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class DatadetailsController extends Controller
{
    private function decryptId($id)
    {
        try {
            return Crypt::decryptString($id);
        } catch (DecryptException $e) {
            abort(404);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return redirect('forms');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('datadetails.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  DatadetailRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DatadetailRequest $request)
    {
        $datadetail = new Datadetail;
		$datadetail->user_id = $request->input('user_id');
		$datadetail->tipe = $request->input('tipe');
		$datadetail->nama = $request->input('nama');
		$datadetail->jabatan = $request->input('jabatan');
		$datadetail->hubungan = $request->input('hubungan');
        $datadetail->save();

        return redirect('forms');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $id = $this->decryptId($id);
        $datadetail = Datadetail::findOrFail($id);
        return view('datadetails.show',['datadetail'=>$datadetail]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $id = $this->decryptId($id);
        $datadetail = Datadetail::findOrFail($id);
        return view('datadetails.edit',['datadetail'=>$datadetail]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DatadetailRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(DatadetailRequest $request, $id)
    {
        $id = $this->decryptId($id);
        $datadetail = Datadetail::findOrFail($id);
		$datadetail->user_id = $request->input('user_id');
		$datadetail->tipe = $request->input('tipe');
		$datadetail->nama = $request->input('nama');
		$datadetail->jabatan = $request->input('jabatan');
		$datadetail->hubungan = $request->input('hubungan');
        $datadetail->save();

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
        $id = $this->decryptId($id);
        $datadetail = Datadetail::findOrFail($id);
        $datadetail->delete();

        return redirect('forms');
    }
}
