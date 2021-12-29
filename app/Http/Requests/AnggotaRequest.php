<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnggotaRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nis'           => 'required',
            'nama_anggota'  => 'required',
            'kelas'         => 'required',
            'jurusan_id'    => 'required',
            'hp'            => 'required|max:13'
        ];
    }
}
