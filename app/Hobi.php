<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hobi extends Model
{
	// nama table dari database untuk model Hobi{}
    protected $table = 'hobi';
    // mass assigment atau kolom apa saja yang akan dimasukkan
    protected $fillable = ['nama_hobi'];


   	// 
   	public function siswa()
   	{
   		//Argument 1 =  Siswa::class bisa juga ditulis 'App\Siswa' artinya mengacu kepada model yang mau direlasikan
   		//Argument 2 =  nama junction table / table penghubung
   		//Argument 3 =  nama kolom fk pada tabel hobi_siswa yg menghubungkan ke class Hobi{}
   		//Argument 4 = nama kolom yang menjadi foreign key pada tabel hobi_siswa yang menghubungkan ke class Siswa{}
   		return $this->belongsToMany(Siswa::class, 'hobi_siswa', 'id_hobi', 'id_siswa');
   	}
}
