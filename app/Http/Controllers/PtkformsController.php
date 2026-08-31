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
use App\Models\Location;
use App\Models\Ptkformtransaction;
use App\Models\Ptkfield;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class PtkformsController extends Controller
{
    /**
     * Master data (division/department/.../location) rarely changes, but
     * create()/edit() were loading all 8 tables in full on every request.
     * These are cached indefinitely and busted by the 'master_*' forget()
     * calls already scattered across this controller and the dedicated
     * Divisions/Departments/Jobtitles controllers.
     */
    private function getMasterData()
    {
        return [
            'divisions' => Cache::rememberForever('master_divisions', fn () => Division::orderBy('division_name')->get()),
            'departments' => Cache::rememberForever('master_departments', fn () => Department::orderBy('department_name')->get()),
            'sections' => Cache::rememberForever('master_sections', fn () => Section::orderBy('section_name')->get()),
            'jobtitles' => Cache::rememberForever('master_jobtitles', fn () => Jobtitle::orderBy('jobtitle_name')->get()),
            'educations' => Cache::rememberForever('master_educations', fn () => Education::all()),
            'majors' => Cache::rememberForever('master_majors', fn () => Major::orderBy('major_name')->get()),
            'fields' => Cache::rememberForever('master_fields', fn () => Field::orderBy('field_name')->get()),
            'locations' => Cache::rememberForever('master_locations', fn () => Location::orderBy('location_name')->get()),
        ];
    }

    /**
     * Clears the public vacancy listing/detail caches (MainController,
     * VacancyApiController) so a status/date/content change on a vacancy is
     * visible immediately instead of waiting out the cache TTL.
     */
    private function clearPublicVacancyCache($id = null)
    {
        cache()->forget('public_vacancies_home');
        cache()->forget('public_vacancies_all');
        cache()->forget('public_vacancies_api');
        if ($id) {
            cache()->forget("public_vacancy_detail_{$id}");
        }
    }

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
        return view('ptkforms.create', $this->getMasterData());
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
        $ptkform->location_id = $request->input('location_id');
        $ptkform->education_id = $request->input('education_id');
        $ptkform->major_id = $request->input('major_id');
        $ptkform->date_startwork = $request->input('date_startwork', date('Y-m-d'));
        $ptkform->direct_superior = $request->input('direct_superior');
        $ptkform->direct_junior = $request->input('direct_junior') ?? '0';
        $ptkform->responsibility = $request->input('responsibility');
        $ptkform->gender = $request->input('gender', 0);
        $ptkform->ipk = $request->input('ipk', 3.00);
        $ptkform->special_conditions = $request->input('special_conditions');
        $ptkform->general_others = $request->input('general_others');
        $ptkform->request_basis = $request->input('request_basis', 'Peningkatan Volume Kerja');
        $ptkform->request_basis_for = $request->input('request_basis_for', 'Pengembangan Struktur Organisasi');
        $ptkform->status_pegawai = $request->input('status_pegawai', 'Staff');
        
        $userRole = strtoupper(Auth::user()->role ?? '');
        if ($request->has('status') && $request->input('status') !== null) {
            $ptkform->status = $request->input('status');
        } else {
            $ptkform->status = ($userRole == 'ADMIN') ? 1 : 0;
        }

        $ptkform->date_open_vacancy = $request->input('date_open_vacancy') ?: date('Y-m-d');
        $ptkform->date_closed_vacancy = $request->input('date_closed_vacancy') ?: date('Y-m-d', strtotime('+5 years'));

        $ptkform->save();

        if ($request->fields != null && is_array($request->fields)) {
            for ($i = 0; $i < count($request->fields); $i++) {
                if (!empty($request->fields[$i])) {
                    Ptkfield::create([
                        "ptkform_id" => $ptkform->id,
                        "field_id"   => $request->fields[$i],
                        "year"       => $request->tahun[$i] ?? 1
                    ]);
                }
            }
        }

        // Forget master data cache so new entries are visible immediately
        cache()->forget('master_divisions');
        cache()->forget('master_departments');
        cache()->forget('master_sections');
        cache()->forget('master_jobtitles');
        cache()->forget('master_educations');
        cache()->forget('master_majors');
        cache()->forget('master_fields');
        cache()->forget('master_locations');
        $this->clearPublicVacancyCache();

        AlertSuccess("Success", "Vacancy / Lowongan berhasil dibuat dan dipublikasikan!");
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
        $trs = Ptkformtransaction::where('ptkform_id', $id)
            ->where('user_id', Auth::user()->id)
            ->first();

        $jobtitle = Jobtitle::findOrFail($ptkform->jobtitle_id);

        $isApplied = false;
        if (!empty($trs)) {
            $isApplied = true;
        }
        return view('ptkforms.detail', compact('isApplied', 'ptkform', 'jobtitle'));
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

        return view('ptkforms.edit', array_merge(['ptkform' => $ptkform], $this->getMasterData()));
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
        $ptkform->location_id = $request->input('location_id');
        $ptkform->education_id = $request->input('education_id');
        $ptkform->major_id = $request->input('major_id');
        $ptkform->date_startwork = $request->input('date_startwork');
        $ptkform->direct_superior = $request->input('direct_superior');
        $ptkform->direct_junior = $request->input('direct_junior') ?? '0';
        $ptkform->responsibility = $request->input('responsibility');
        $ptkform->gender = $request->input('gender', 0);
        $ptkform->ipk = $request->input('ipk');
        $ptkform->special_conditions = $request->input('special_conditions');
        $ptkform->general_others = $request->input('general_others');
        $ptkform->request_basis = $request->input('request_basis', 'Peningkatan Volume Kerja');
        $ptkform->request_basis_for = $request->input('request_basis_for', 'Pengembangan Struktur Organisasi');
        $ptkform->status_pegawai = $request->input('status_pegawai');
        
        if ($request->has('status')) {
            $ptkform->status = $request->input('status');
        }
        if ($request->filled('date_open_vacancy')) {
            $ptkform->date_open_vacancy = $request->input('date_open_vacancy');
        }
        if ($request->filled('date_closed_vacancy')) {
            $ptkform->date_closed_vacancy = $request->input('date_closed_vacancy');
        }

        $ptkform->save();
        
        // Update experience requirements
        \App\Models\Ptkfield::where('ptkform_id', $id)->delete();
        if ($request->fields != null && is_array($request->fields)) {
            for ($i = 0; $i < count($request->fields); $i++) {
                if (!empty($request->fields[$i])) {
                    \App\Models\Ptkfield::create([
                        "ptkform_id" => $ptkform->id,
                        "field_id"   => $request->fields[$i],
                        "year"       => $request->tahun[$i] ?? 1
                    ]);
                }
            }
        }

        cache()->forget('master_divisions');
        cache()->forget('master_departments');
        cache()->forget('master_sections');
        cache()->forget('master_jobtitles');
        cache()->forget('master_educations');
        cache()->forget('master_majors');
        cache()->forget('master_fields');
        cache()->forget('master_locations');
        $this->clearPublicVacancyCache($id);

        AlertSuccess("Success", "Data lowongan berhasil diperbarui!");
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
        $this->clearPublicVacancyCache($id);

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
        $this->clearPublicVacancyCache($id);

        return redirect("ptkforms/$id");
    }
}
