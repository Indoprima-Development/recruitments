<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecruitmentExternal;
use App\Imports\RecruitmentExternalImport;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $headers = [
            'No.', 'Nama', 'Month', 'Connect Sent', 'Connected', 'Approached', 'Responded', 
            'Level', 'Position', 'Plant/Division', 'Level Pendidikan', 'Campus', 'Jurusan', 
            'Sumber', 'PIC', 'Date', 'Result/Note', 'Date', 'Result/Note', 'Date', 'Result/Note', 
            'Date', 'Month', 'Result/Note', 'Date', 'Result Director', 'Interview', 'Connect', 
            'Approach', 'Committee', 'OK', 'Experience', 'Technical', 'Psikotes'
        ];
        
        $sheet->fromArray([$headers], NULL, 'A1');
        
        foreach (range('A', $sheet->getHighestColumn()) as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'Template_Recruitment_External.xlsx';
        
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'. urlencode($fileName).'"');
        $writer->save('php://output');
        exit;
    }
}
