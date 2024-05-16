<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Field;
use App\Http\Requests\FieldRequest;

class FieldsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $fields= Field::all();
        return view('fields.index', ['fields'=>$fields]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('fields.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  FieldRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FieldRequest $request)
    {
        $field = new Field;
		$field->field_name = $request->input('field_name');
        $field->save();

        return to_route('fields.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $field = Field::findOrFail($id);
        return view('fields.show',['field'=>$field]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $field = Field::findOrFail($id);
        return view('fields.edit',['field'=>$field]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  FieldRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(FieldRequest $request, $id)
    {
        $field = Field::findOrFail($id);
		$field->field_name = $request->input('field_name');
        $field->save();

        return to_route('fields.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $field = Field::findOrFail($id);
        $field->delete();

        return to_route('fields.index');
    }
}
