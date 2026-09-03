<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Datakesehatan;
use App\Http\Requests\DatakesehatanRequest;


use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class DatakesehatansController extends Controller
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
        return view('datakesehatans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  DatakesehatanRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DatakesehatanRequest $request)
    {
        $datakesehatan = new Datakesehatan;
		$datakesehatan->user_id = $request->input('user_id');
		$datakesehatan->kesehatan = $request->input('kesehatan');
		$datakesehatan->keterangan = $request->input('keterangan');
        $datakesehatan->save();

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
        return redirect('forms');
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
        $datakesehatan = Datakesehatan::findOrFail($id);
        return view('datakesehatans.edit',['datakesehatan'=>$datakesehatan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DatakesehatanRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(DatakesehatanRequest $request, $id)
    {
        $id = $this->decryptId($id);
        $datakesehatan = Datakesehatan::findOrFail($id);
		$datakesehatan->user_id = $request->input('user_id');
		$datakesehatan->kesehatan = $request->input('kesehatan');
		$datakesehatan->keterangan = $request->input('keterangan');
        $datakesehatan->save();

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
        $datakesehatan = Datakesehatan::findOrFail($id);
        $datakesehatan->delete();

        return redirect('forms');
    }
}
