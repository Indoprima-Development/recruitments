<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecruitmentExternal;
use App\Imports\RecruitmentExternalImport;
use App\Exports\RecruitmentExternalTemplateExport;
use Maatwebsite\Excel\Facades\Excel;

class RecruitmentExternalController extends Controller
{
    public function index()
    {
        $data = RecruitmentExternal::latest()->get();
        return view('recruitment_externals.index', compact('data'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);

        try {
            Excel::import(new RecruitmentExternalImport, $request->file('file'));
            return redirect()->back()->with('success', 'Data imported successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error importing file: ' . $e->getMessage());
        }
    }

    public function downloadTemplate()
    {
        return Excel::download(new RecruitmentExternalTemplateExport, 'Template_Recruitment_External.xlsx');
    }
}
