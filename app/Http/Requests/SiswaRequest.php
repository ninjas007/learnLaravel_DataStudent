<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Request;

class SiswaRequest extends FormRequest
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
        // cek apakah Create atau update
        if ($this->method() == 'PATCH'){
            $nisn_rules = 'required|string|size:4|unique:siswa,nisn,'. $this->get('id');
            $telepon_rules = 'nullable|numeric|digits_between:10,15|unique:telepon,nomor_telepon,'. $this->get('id'). ',id_siswa';
            $foto_rules = 'nullable';
        } else {
            $nisn_rules = 'required|string|size:4|unique:siswa,nisn';
            $telepon_rules = 'nullable|numeric|digits_between:10,15|unique:telepon,nomor_telepon';
            $foto_rules = 'nullable|image|max:500|mimes:jpeg,jpg,bmp,png';
        }

        return [
            'nisn'          => $nisn_rules,
            'nama_siswa'    => 'required|string|max:30',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'nomor_telepon' => $telepon_rules,
            'id_kelas'      => 'required',
            'foto'          => $foto_rules,
        ];
    }
}
