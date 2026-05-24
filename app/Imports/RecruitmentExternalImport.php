<?php

namespace App\Imports;

use App\Models\RecruitmentExternal;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class RecruitmentExternalImport implements ToModel, WithStartRow
{
    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (!isset($row[1])) {
            return null;
        }

        return new RecruitmentExternal([
            'no'               => $row[0] ?? null,
            'nama'             => $row[1] ?? null,
            'month_1'          => $row[2] ?? null,
            'connect_sent'     => $row[3] ?? null,
            'connected'        => $row[4] ?? null,
            'approached'       => $row[5] ?? null,
            'responded'        => $row[6] ?? null,
            'level'            => $row[7] ?? null,
            'position'         => $row[8] ?? null,
            'plant_division'   => $row[9] ?? null,
            'level_pendidikan' => $row[10] ?? null,
            'campus'           => $row[11] ?? null,
            'jurusan'          => $row[12] ?? null,
            'sumber'           => $row[13] ?? null,
            'pic'              => $row[14] ?? null,
            'date_1'           => $this->transformDate($row[15] ?? null),
            'result_note_1'    => $row[16] ?? null,
            'date_2'           => $this->transformDate($row[17] ?? null),
            'result_note_2'    => $row[18] ?? null,
            'date_3'           => $this->transformDate($row[19] ?? null),
            'result_note_3'    => $row[20] ?? null,
            'date_4'           => $this->transformDate($row[21] ?? null),
            'month_2'          => $row[22] ?? null,
            'result_note_4'    => $row[23] ?? null,
            'date_5'           => $this->transformDate($row[24] ?? null),
            'result_director'  => $row[25] ?? null,
            'interview'        => $row[26] ?? null,
            'connect'          => $row[27] ?? null,
            'approach'         => $row[28] ?? null,
            'committee'        => $row[29] ?? null,
            'ok'               => $row[30] ?? null,
            'experience'       => $row[31] ?? null,
            'technical'        => $row[32] ?? null,
            'psikotes'         => $row[33] ?? null,
        ]);
    }
    
    private function transformDate($value)
    {
        if (empty($value)) return null;
        try {
            if (is_numeric($value)) {
                return \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value)->format('Y-m-d');
            }
            return Carbon::parse($value)->format('Y-m-d');
        } catch (\Exception $e) {
            return null;
        }
    }
}
