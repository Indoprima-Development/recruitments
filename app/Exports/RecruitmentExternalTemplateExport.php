<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class RecruitmentExternalTemplateExport implements FromArray, WithHeadings, ShouldAutoSize, WithStyles
{
    public function array(): array
    {
        return [
            // Return an empty row or just rely on headings
            []
        ];
    }

    public function headings(): array
    {
        return [
            'No.', 'Nama', 'Month', 'Connect Sent', 'Connected', 'Approached', 'Responded', 
            'Level', 'Position', 'Plant/Division', 'Level Pendidikan', 'Campus', 'Jurusan', 
            'Sumber', 'PIC', 'Date', 'Result/Note', 'Date', 'Result/Note', 'Date', 'Result/Note', 
            'Date', 'Month', 'Result/Note', 'Date', 'Result Director', 'Interview', 'Connect', 
            'Approach', 'Committee', 'OK', 'Experience', 'Technical', 'Psikotes'
        ];
    }
    
    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['bold' => true]],
        ];
    }
}
