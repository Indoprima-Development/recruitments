<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Department;
use App\Http\Requests\DepartmentRequest;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $departments= Department::all();
        return view('departments.index', ['departments'=>$departments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  DepartmentRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DepartmentRequest $request)
    {
        $department = new Department;
		$department->division_id = $request->input('division_id');
		$department->department_name = $request->input('department_name');
        $department->save();

        return to_route('departments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $department = Department::findOrFail($id);
        return view('departments.show',['department'=>$department]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return view('departments.edit',['department'=>$department]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DepartmentRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(DepartmentRequest $request, $id)
    {
        $department = Department::findOrFail($id);
		$department->division_id = $request->input('division_id');
		$department->department_name = $request->input('department_name');
        $department->save();

        return to_route('departments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return to_route('departments.index');
    }
}
