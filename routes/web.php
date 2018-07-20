<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// routing halaman depan
Route::get('/', 'PagesController@homepage');

// routing untuk halaman about
Route::get('about', 'PagesController@about');

// Route::group(['middleware' => ['web']], function(){
// 	// routing untuk halaman index siswa
// 	Route::get('siswa', 'SiswaController@index');

// 	// routing untuk menampilkan halaman form tambah
// 	Route::get('siswa/create', 'SiswaController@create');

// 	// routing untuk menambah data siswa
// 	Route::post('siswa', 'SiswaController@store');

// 	// routing untuk menampilkan detail siswa
// 	Route::get('siswa/{siswa}', 'SiswaController@show');

// 	// routing untuk halaman edit data siswa
// 	Route::get('siswa/edit/{siswa}', 'SiswaController@edit');
// 	// routing untuk mengedit data siswanya
// 	Route::patch('siswa/{siswa}', 'SiswaController@update');

// 	// routing untuk delete
// 	Route::delete('siswa/{siswa}', 'SiswaController@destroy');
// });

// YANG DIATAS BISA DISEDERHANAKAN seperti Route::resource dibawah JIKA MENGIKUTI ATURAN LARAVEL index,create,store,edit,update,delete

Route::group(['middleware' => ['web']], function() {
    
    Route::get('siswa/cari', 'SiswaController@cari');

    Route::resource('siswa', 'SiswaController');

    Route::resource('kelas', 'KelasController');
});


Route::get('tes-collection', 'SiswaController@tescollection');

Route::get('date-mutator', 'SiswaController@datemutator');












// Route::get('sampledata', function(){
// 	DB::table('siswa')->insert([
// 		[
// 			'nisn'	=>	'1001',
// 			'nama_siswa'	=>	'Agus Yulianto',
// 			'tanggal_lahir'	=>	'1990-02-12',
// 			'jenis_kelamin'	=>	'L',
// 			'created_at'	=>	'2016-03-10 19:10:15',
// 			'updated_at'	=>	'2016-03-10 19:10:15'
// 		],
// 		[
// 			'nisn'	=>	'1002',
// 			'nama_siswa'	=>	'Agustina Anggraeni',
// 			'tanggal_lahir'	=>	'1990-03-01',
// 			'jenis_kelamin'	=>	'P',
// 			'created_at'	=>	'2016-03-10 19:10:15',
// 			'updated_at'	=>	'2016-03-10 19:10:15'
// 		],
// 		[
// 			'nisn'	=>	'1003',
// 			'nama_siswa'	=>	'Bayu Firmansyah',
// 			'tanggal_lahir'	=>	'1990-02-12',
// 			'jenis_kelamin'	=>	'L',
// 			'created_at'	=>	'2016-03-10 19:10:15',
// 			'updated_at'	=>	'2016-03-10 19:10:15'
// 		],
// 		[
// 			'nisn'	=>	'1004',
// 			'nama_siswa'	=>	'Citra Rahmawati',
// 			'tanggal_lahir'	=>	'1991-02-12',
// 			'jenis_kelamin'	=>	'P',
// 			'created_at'	=>	'2016-03-10 19:10:15',
// 			'updated_at'	=>	'2016-03-10 19:10:15'
// 		],
// 		[
// 			'nisn'	=>	'1005',
// 			'nama_siswa'	=>	'Dirgantara Laksana',
// 			'tanggal_lahir'	=>	'1990-10-10',
// 			'jenis_kelamin'	=>	'L',
// 			'created_at'	=>	'2016-03-10 19:10:15',
// 			'updated_at'	=>	'2016-03-10 19:10:15'
// 		],
// 		[
// 			'nisn'	=>	'1006',
// 			'nama_siswa'	=>	'Eko Satrio',
// 			'tanggal_lahir'	=>	'1990-07-14',
// 			'jenis_kelamin'	=>	'L',
// 			'created_at'	=>	'2016-03-10 19:10:15',
// 			'updated_at'	=>	'2016-03-10 19:10:15'
// 		]
// 	]);
// });

