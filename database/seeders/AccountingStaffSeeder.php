<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Division;
use App\Models\Department;
use App\Models\Section;
use App\Models\Jobtitle;
use App\Models\Education;
use App\Models\Major;
use App\Models\Location;
use App\Models\Field;
use App\Models\Ptkform;
use App\Models\Ptkfield;

class AccountingStaffSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Division: Accounting, Finance & IS
        $division = Division::firstOrCreate(
            ['division_name' => 'Accounting, Finance & IS']
        );

        // 2. Department: Accounting
        $department = Department::firstOrCreate(
            ['department_name' => 'Accounting', 'division_id' => $division->id]
        );

        // 3. Section: Accounting
        $section = Section::firstOrCreate(
            ['section_name' => 'Accounting', 'department_id' => $department->id]
        );

        // 4. Jobtitle: Accounting Staff (Mandarin Speaker)
        $jobtitle = Jobtitle::firstOrCreate(
            ['jobtitle_name' => 'Accounting Staff (Mandarin Speaker)'],
            ['section_id' => $section->id]
        );
        $jobtitle->section_id = $section->id;
        $jobtitle->save();

        // 5. Education: D4/S1 or S2
        $education = Education::where('education_name', 'like', '%S1%')->first()
            ?: Education::firstOrCreate(['education_name' => 'D4/S1']);

        // 6. Major: Accounting / Finance
        $major = Major::where('major_name', 'like', '%Accounting%')->first()
            ?: Major::firstOrCreate(['major_name' => 'Accounting']);

        // 7. Location: Surabaya & Gresik
        $location = Location::where('location_name', 'like', '%Surabaya%')->first()
            ?: Location::firstOrCreate(['location_name' => 'Surabaya & Gresik']);

        // 8. Field of Experience
        $field = Field::where('field_name', 'like', '%Accounting%')->first()
            ?: Field::firstOrCreate(['field_name' => 'Accounting']);

        // 9. Create or Update Vacancy
        $ptk = Ptkform::where('jobtitle_id', $jobtitle->id)->first();
        if (!$ptk) {
            $ptk = new Ptkform();
        }

        $ptk->division_id = $division->id;
        $ptk->department_id = $department->id;
        $ptk->section_id = $section->id;
        $ptk->jobtitle_id = $jobtitle->id;
        $ptk->location_id = $location->id;
        $ptk->education_id = $education->id;
        $ptk->major_id = $major->id;
        $ptk->date_startwork = date('Y-m-d');
        $ptk->direct_superior = 'Accounting Manager';
        $ptk->direct_junior = '0';
        $ptk->responsibility = '<ul>' .
            '<li>Melakukan pencatatan seluruh transaksi keuangan dan rekonsiliasi akun akuntansi secara akurat dan tepat waktu.</li>' .
            '<li>Melakukan komunikasi, koordinasi, dan korespondensi dokumen keuangan dalam bahasa Mandarin (Mandarin Speaker).</li>' .
            '<li>Menyusun laporan keuangan periodik dan analisa pembukuan sesuai standar akuntansi yang berlaku di PT. Indoprima Gemilang.</li>' .
            '<li>Mendukung proses audit laporan keuangan internal maupun eksternal serta kepatuhan perpajakan perusahaan.</li>' .
            '</ul>';
        $ptk->special_conditions = '<ul>' .
            '<li>Bachelor\'s Degree or Master\'s Degree in Accounting/Finance/Banking, Economics, Financial Management, or Equivalent.</li>' .
            '<li>GPA minimum 3,00 out of 4,00 or freshgraduate with GPA minimum 3,50 out of 4,00.</li>' .
            '<li>Proficiency in Mandarin minimum HSK 3.</li>' .
            '<li>At least 1-2 years of working experience in the related field is required for this position or fresh graduates with experiences in similar project.</li>' .
            '<li>Entitled as the best graduate from any university, or having national or international achievements is a big advantage.</li>' .
            '<li>Willing to be placed in all areas of PT. Indoprima Gemilang.</li>' .
            '</ul>';
        $ptk->general_others = '<p>Submit your application through: <strong>career.indoprimagemilang.com</strong></p>';
        $ptk->gender = 0; // Any Gender
        $ptk->ipk = 3.00;
        $ptk->request_basis = 'Peningkatan Volume Kerja';
        $ptk->request_basis_for = 'Pengembangan Struktur Organisasi';
        $ptk->status_pegawai = 'Staff';
        $ptk->status = 1; // Open & Active
        $ptk->date_open_vacancy = date('Y-m-d');
        $ptk->date_closed_vacancy = date('Y-m-d', strtotime('+3 years'));
        $ptk->save();

        // 10. Link experience requirement
        Ptkfield::where('ptkform_id', $ptk->id)->delete();
        Ptkfield::create([
            'ptkform_id' => $ptk->id,
            'field_id' => $field->id,
            'year' => 1
        ]);

        cache()->flush();
    }
}
