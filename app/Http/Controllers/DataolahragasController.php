<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Dataolahraga;
use App\Http\Requests\DataolahragaRequest;
use Illuminate\Support\Facades\Crypt;

class DataolahragasController extends Controller
{
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
        return view('dataolahragas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  DataolahragaRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DataolahragaRequest $request)
    {
        $dataolahraga = new Dataolahraga;
		$dataolahraga->user_id = $request->input('user_id');
		$dataolahraga->olahraga = $request->input('olahraga');
		$dataolahraga->level = $request->input('level');
        $dataolahraga->save();

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
        $id = Crypt::decryptString($id);
        $dataolahraga = Dataolahraga::findOrFail($id);
        return view('dataolahragas.edit',['dataolahraga'=>$dataolahraga]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DataolahragaRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(DataolahragaRequest $request, $id)
    {
        $id = Crypt::decryptString($id);
        $dataolahraga = Dataolahraga::findOrFail($id);
		$dataolahraga->user_id = $request->input('user_id');
		$dataolahraga->olahraga = $request->input('olahraga');
		$dataolahraga->level = $request->input('level');
        $dataolahraga->save();

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
        $id = Crypt::decryptString($id);
        $dataolahraga = Dataolahraga::findOrFail($id);
        $dataolahraga->delete();

        return redirect('forms');
    }
}
