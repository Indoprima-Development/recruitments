<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Ptkform;
use App\Http\Requests\PtkformRequest;

use App\Models\Division;
use App\Models\Department;
use App\Models\Section;
use App\Models\Jobtitle;
use App\Models\Education;
use App\Models\Major;
use App\Models\Field;
use App\Models\Ptkformtransaction;
use App\Models\Ptkfield;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PtkformsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $ptkforms = Ptkform::with(['jobtitle', 'division', 'department', 'section'])
            ->withCount('transactions')
            ->orderBy('id', 'desc')
            ->get();

        return view('ptkforms.index', ['ptkforms' => $ptkforms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $divisions = Division::all();
        $departments = Department::all();
        $sections = Section::all();
        $jobtitles = Jobtitle::all();
        $educations = Education::all();
        $majors = Major::all();
        $fields = Field::all();

        return view('ptkforms.create', compact('divisions', 'departments', 'sections', 'jobtitles', 'educations', 'majors', 'fields'));
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
        $ptkform->status_pegawai = $request->input('status_pegawai');
        $ptkform->status = 0;

        //if create by admin, by pass to approved status
        if (Auth::user()->role == 'ADMIN') {
            $ptkform->status = 1;
            $ptkform->date_open_vacancy   = '2000-01-01 00:00';
            $ptkform->date_closed_vacancy = '2030-12-31 23:59';
        }

        $ptkform->save();

        if ($request->fields != null) {
            for ($i = 0; $i < count($request->fields); $i++) {
                Ptkfield::create([
                    "ptkform_id"    => $ptkform->id,
                    "field_id"      => $request->fields[$i],
                    "year"          => $request->tahun[$i]
                ]);
            }
        }

        AlertSuccess("Success","Data berhasil dibuat");
        return redirect('vacancies');
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
        $trs = Ptkformtransaction::where('ptkform_id',$id)
        ->where('user_id',Auth::user()->id)
        ->first();

        $jobtitle = Jobtitle::findOrFail($ptkform->jobtitle_id);

        $isApplied = false;
        if (!empty($trs)) {
            $isApplied = true;
        }
        return view('ptkforms.detail', compact('isApplied','ptkform','jobtitle'));
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
        $divisions = Division::all();
        $departments = Department::all();
        $sections = Section::all();
        $jobtitles = Jobtitle::all();
        $educations = Education::all();
        $majors = Major::all();
        $fields = Field::all();

        return view('ptkforms.edit', compact('ptkform', 'divisions', 'departments', 'sections', 'jobtitles', 'educations', 'majors', 'fields'));
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

        AlertSuccess("Success","Data berhasil diubah");
        return redirect('vacancies');
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

        // Soft delete logic - simply close the vacancy
        $ptkform->status = 0; // 0 = Inactive/Closed
        $ptkform->save();

        AlertSuccess("Success", "Vacancy closed successfully (Hidden from public)");
        return redirect()->back();
    }

    public function changeStatus(Request $request, $id)
    {
        Ptkform::where("id", $id)->update([
            "status" => 1,
            "date_open_vacancy"=> $request->date_start,
            "date_closed_vacancy"=> $request->date_end,
        ]);

        return redirect("ptkforms/$id");
    }
}
