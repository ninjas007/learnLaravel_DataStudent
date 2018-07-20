<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = [
    	'nisn',
    	'nama_siswa',
    	'tanggal_lahir',
    	'jenis_kelamin',
      'id_kelas',
      'foto',
    ];
    protected $dates = ['tanggal_lahir'];

    public function setNamaSiswaAttribute($value)
   	{
   		$this->attributes['nama_siswa'] = strtolower($value);
   		// return strtolower($value);
   	}

    public function getNamaSiswaAttribute($nama_siswa)
    {
    	return ucwords($nama_siswa);
    }

    // PERHATIKAN PADA ARGUMENNYA(PARAMETERNYA) JANGAN SAMPAI TERTUKAR

    // relasi table one to one nya dsini dan di model telepon
    public function telepon()
    {
      return $this->hasOne('App\Telepon', 'id_siswa');
    }

    // relasi table one to many
    public function kelas()
    {
      return $this->belongsTo('App\Kelas', 'id_kelas');
    }

    // relasi table many to many
    public function hobi()
    {
      // method withTimeStamps berfungsi untuk mencegah error karena pada tabel hobi_siswa juga ada kolom crate/updated time
      return $this->belongsToMany(Hobi::class, 'hobi_siswa', 'id_siswa', 'id_hobi')->withTimeStamps();
    }

    public function getHobiSiswaAttribute()
    {
      return $this->hobi->pluck('id')->toArray();
    }
}
