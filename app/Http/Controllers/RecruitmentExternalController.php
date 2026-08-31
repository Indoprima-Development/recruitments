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
        $data = RecruitmentExternal::latest()->paginate(25);
        return view('recruitment_externals.index', compact('data'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);

        try {
            // Queued: the import runs in the background via the redis queue
            // worker instead of blocking this request until every row/chunk
            // is inserted.
            Excel::queueImport(new RecruitmentExternalImport, $request->file('file'));
            return redirect()->back()->with('success', 'File diterima dan sedang diproses di background. Data akan muncul beberapa saat lagi.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error importing file: ' . $e->getMessage());
        }
    }

    public function downloadTemplate()
    {
        return Excel::download(new RecruitmentExternalTemplateExport, 'Template_Recruitment_External.xlsx');
    }
}
