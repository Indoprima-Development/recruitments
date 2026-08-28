<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PtkformRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'division_id' => 'required',
            'department_id' => 'required',
            'section_id' => 'required',
            'jobtitle_id' => 'required',
            'education_id' => 'required',
            'major_id' => 'required',
            'date_startwork' => 'required',
            'direct_superior' => 'required',
            'direct_junior' => 'nullable',
            'responsibility' => 'nullable',
            'gender' => 'required',
            'ipk' => 'required|numeric',
            'special_conditions' => 'nullable',
            'general_others' => 'nullable',
            'request_basis' => 'nullable',
            'request_basis_for' => 'nullable',
            'status_pegawai' => 'required',
            'location_id' => 'nullable',
            'date_open_vacancy' => 'nullable',
            'date_closed_vacancy' => 'nullable',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'division_id.required' => 'Divisi wajib dipilih.',
            'department_id.required' => 'Departemen wajib dipilih.',
            'section_id.required' => 'Section / Bagian wajib dipilih.',
            'jobtitle_id.required' => 'Posisi / Job Title wajib dipilih.',
            'education_id.required' => 'Minimal Pendidikan wajib dipilih.',
            'major_id.required' => 'Jurusan (Major) wajib dipilih.',
            'date_startwork.required' => 'Tanggal mulai kerja wajib diisi.',
            'direct_superior.required' => 'Atasan langsung (Direct Superior) wajib diisi.',
            'gender.required' => 'Preferensi jenis kelamin wajib dipilih.',
            'ipk.required' => 'Minimal IPK / GPA wajib diisi.',
            'ipk.numeric' => 'Format IPK harus berupa angka (contoh: 3.00).',
            'status_pegawai.required' => 'Status kepegawaian wajib dipilih.',
        ];
    }
}

