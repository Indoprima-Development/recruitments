<?php

namespace App\Imports;

use App\Models\RecruitmentExternal;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class RecruitmentExternalImport implements ToModel, WithStartRow, WithBatchInserts, WithChunkReading, WithCalculatedFormulas
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
        // Skip if name is empty
        if (empty($row[1])) {
            return null;
        }

        return new RecruitmentExternal([
            'no'               => isset($row[0]) ? (string)$row[0] : null,
            'nama'             => isset($row[1]) ? (string)$row[1] : null,
            'month_1'          => isset($row[2]) ? (string)$row[2] : null,
            'connect_sent'     => isset($row[3]) ? (string)$row[3] : null,
            'connected'        => isset($row[4]) ? (string)$row[4] : null,
            'approached'       => isset($row[5]) ? (string)$row[5] : null,
            'responded'        => isset($row[6]) ? (string)$row[6] : null,
            'level'            => isset($row[7]) ? (string)$row[7] : null,
            'position'         => isset($row[8]) ? (string)$row[8] : null,
            'plant_division'   => isset($row[9]) ? (string)$row[9] : null,
            'level_pendidikan' => isset($row[10]) ? (string)$row[10] : null,
            'campus'           => isset($row[11]) ? (string)$row[11] : null,
            'jurusan'          => isset($row[12]) ? (string)$row[12] : null,
            'sumber'           => isset($row[13]) ? (string)$row[13] : null,
            'pic'              => isset($row[14]) ? (string)$row[14] : null,
            'date_1'           => $this->transformDate($row[15] ?? null),
            'result_note_1'    => isset($row[16]) ? (string)$row[16] : null,
            'date_2'           => $this->transformDate($row[17] ?? null),
            'result_note_2'    => isset($row[18]) ? (string)$row[18] : null,
            'date_3'           => $this->transformDate($row[19] ?? null),
            'result_note_3'    => isset($row[20]) ? (string)$row[20] : null,
            'date_4'           => $this->transformDate($row[21] ?? null),
            'month_2'          => isset($row[22]) ? (string)$row[22] : null,
            'result_note_4'    => isset($row[23]) ? (string)$row[23] : null,
            'date_5'           => $this->transformDate($row[24] ?? null),
            'result_director'  => isset($row[25]) ? (string)$row[25] : null,
            'interview'        => isset($row[26]) ? (string)$row[26] : null,
            'connect'          => isset($row[27]) ? (string)$row[27] : null,
            'approach'         => isset($row[28]) ? (string)$row[28] : null,
            'committee'        => isset($row[29]) ? (string)$row[29] : null,
            'ok'               => isset($row[30]) ? (string)$row[30] : null,
            'experience'       => isset($row[31]) ? (string)$row[31] : null,
            'technical'        => isset($row[32]) ? (string)$row[32] : null,
            'psikotes'         => isset($row[33]) ? (string)$row[33] : null,
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
    
    public function batchSize(): int
    {
        return 50;
    }

    public function chunkSize(): int
    {
        return 500;
    }
}
