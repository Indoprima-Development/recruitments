<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DatapengalamankerjaRequest extends FormRequest
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
        return
        [
			'user_id' => 'required',
			'perusahaan' => 'required',
			'jabatan_awal' => 'required',
			'jabatan_terakhir' => 'required',
			'gaji_awal' => 'required',
			'gaji_akhir' => 'required',
			'date_start' => 'required',
			'date_end' => 'required',
			'alasan_keluar' => 'required',
			'surat_pengalaman' => 'required',
        ];
    }
}
