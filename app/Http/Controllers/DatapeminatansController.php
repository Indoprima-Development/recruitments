<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Datapeminatan;
use App\Http\Requests\DatapeminatanRequest;
use App\Models\Field;
use Illuminate\Support\Facades\Auth;

class DatapeminatansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $datapeminatans= Datapeminatan::all();
        return view('datapeminatans.index', ['datapeminatans'=>$datapeminatans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $datapeminatans = Datapeminatan::where('user_id',Auth::user()->id)->get();
        if (count($datapeminatans) >= 3) {
            AlertError("Error","Maksimal data peminatan adalah 3");
            return redirect()->back();
        }
        
        $fields = Field::all();
        return view('datapeminatans.create',compact('fields'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  DatapeminatanRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DatapeminatanRequest $request)
    {
        $datapeminatans = Datapeminatan::where('user_id',Auth::user()->id)->get();
        if (count($datapeminatans) >= 3) {
            AlertError("Error","Maksimal data peminatan adalah 3");
            return redirect()->back();
        }

        $datapeminatan = new Datapeminatan;
		$datapeminatan->user_id = $request->input('user_id');
		$datapeminatan->field_id = $request->input('field_id');
        $datapeminatan->save();

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
        $datapeminatan = Datapeminatan::findOrFail($id);
        return view('datapeminatans.show',['datapeminatan'=>$datapeminatan]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $datapeminatan = Datapeminatan::findOrFail($id);
        return view('datapeminatans.edit',['datapeminatan'=>$datapeminatan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DatapeminatanRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(DatapeminatanRequest $request, $id)
    {
        $datapeminatan = Datapeminatan::findOrFail($id);
		$datapeminatan->user_id = $request->input('user_id');
		$datapeminatan->field_id = $request->input('field_id');
        $datapeminatan->save();

        return to_route('datapeminatans.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $datapeminatan = Datapeminatan::findOrFail($id);
        $datapeminatan->delete();

        return to_route('datapeminatans.index');
    }
}
