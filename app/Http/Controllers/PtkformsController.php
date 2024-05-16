<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Ptkform;
use App\Http\Requests\PtkformRequest;

class PtkformsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $ptkforms= Ptkform::all();
        return view('ptkforms.index', ['ptkforms'=>$ptkforms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('ptkforms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PtkformRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PtkformRequest $request)
    {
        $ptkform = new Ptkform;
		$ptkform->division_id = $request->input('division_id');
		$ptkform->department_id = $request->input('department_id');
		$ptkform->section_id = $request->input('section_id');
		$ptkform->jobtitle_id = $request->input('jobtitle_id');
		$ptkform->education_id = $request->input('education_id');
		$ptkform->major_id = $request->input('major_id');
		$ptkform->date_startwork = $request->input('date_startwork');
		$ptkform->direct_superior = $request->input('direct_superior');
		$ptkform->direct_junior = $request->input('direct_junior');
		$ptkform->responsibility = $request->input('responsibility');
		$ptkform->gender = $request->input('gender');
		$ptkform->ipk = $request->input('ipk');
		$ptkform->special_conditions = $request->input('special_conditions');
		$ptkform->general_others = $request->input('general_others');
		$ptkform->request_basis = $request->input('request_basis');
		$ptkform->request_basis_for = $request->input('request_basis_for');
		$ptkform->status = $request->input('status');
        $ptkform->save();

        return to_route('ptkforms.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $ptkform = Ptkform::findOrFail($id);
        return view('ptkforms.show',['ptkform'=>$ptkform]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $ptkform = Ptkform::findOrFail($id);
        return view('ptkforms.edit',['ptkform'=>$ptkform]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PtkformRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PtkformRequest $request, $id)
    {
        $ptkform = Ptkform::findOrFail($id);
		$ptkform->division_id = $request->input('division_id');
		$ptkform->department_id = $request->input('department_id');
		$ptkform->section_id = $request->input('section_id');
		$ptkform->jobtitle_id = $request->input('jobtitle_id');
		$ptkform->education_id = $request->input('education_id');
		$ptkform->major_id = $request->input('major_id');
		$ptkform->date_startwork = $request->input('date_startwork');
		$ptkform->direct_superior = $request->input('direct_superior');
		$ptkform->direct_junior = $request->input('direct_junior');
		$ptkform->responsibility = $request->input('responsibility');
		$ptkform->gender = $request->input('gender');
		$ptkform->ipk = $request->input('ipk');
		$ptkform->special_conditions = $request->input('special_conditions');
		$ptkform->general_others = $request->input('general_others');
		$ptkform->request_basis = $request->input('request_basis');
		$ptkform->request_basis_for = $request->input('request_basis_for');
		$ptkform->status = $request->input('status');
        $ptkform->save();

        return to_route('ptkforms.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $ptkform = Ptkform::findOrFail($id);
        $ptkform->delete();

        return to_route('ptkforms.index');
    }
}
