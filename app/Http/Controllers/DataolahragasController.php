<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Dataolahraga;
use App\Http\Requests\DataolahragaRequest;

class DataolahragasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $dataolahragas= Dataolahraga::all();
        return view('dataolahragas.index', ['dataolahragas'=>$dataolahragas]);
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
        $dataolahraga = Dataolahraga::findOrFail($id);
        return view('dataolahragas.show',['dataolahraga'=>$dataolahraga]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
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
        $dataolahraga = Dataolahraga::findOrFail($id);
		$dataolahraga->user_id = $request->input('user_id');
		$dataolahraga->olahraga = $request->input('olahraga');
		$dataolahraga->level = $request->input('level');
        $dataolahraga->save();

        return to_route('dataolahragas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $dataolahraga = Dataolahraga::findOrFail($id);
        $dataolahraga->delete();

        return to_route('dataolahragas.index');
    }
}
