<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
// use Validator;
use App\Telepon;
use App\Kelas;
use App\Hobi;
// use Siswa Request untuk form validation cara form request
use App\Http\Requests\SiswaRequest;
use Storage;
use Session;

// use Illuminate\Support\Facades\File;

class SiswaController extends Controller
{



    //tampilkan/masuk ke halaman data
    public function index()
    {
       
        $siswa_list = Siswa::orderBy('id','asc')->Paginate(3);
        $jumlah_siswa = Siswa::count();
        return view('siswa.index', compact('siswa_list', 'jumlah_siswa'));
    }




    //tampilkan/masuk halaman tambah data
    public function create()
    {
        return view('siswa.create');
    }



    //menerima/memproses data dari form
    public function store(SiswaRequest $request)
    {   

        $input = $request->all();

        // file updload gambar
        if($request->hasFile('foto')) {
            $input['foto'] = $this->uploadFoto($request);
        }

        // simpan data siswa
        $siswa = Siswa::create($input);

        // simpan data telepon
        $telepon = new Telepon;
        $telepon->nomor_telepon = $request->input('nomor_telepon');
        $siswa->telepon()->save($telepon);

        //simpan hobi
        $siswa->hobi()->attach($request->input('hobi_siswa'));

        Session::flash('flash_message', 'Data siswa berhasil disimpan');

        return redirect('siswa');
    }



    public function show(Siswa $siswa)
    {

        // dd(delete($siswa->foto));
        // dd($siswa->foto)
        return view('siswa.show', compact('siswa'));

    }



    public function edit(Siswa $siswa)
    {
        // menampilkan halaman edit dan mengambil id tiap siswa yang mau diedit
        $siswa->nomor_telepon = $siswa->telepon->nomor_telepon;
        return view('siswa.edit', compact('siswa'));
    }




    public function update(Siswa $siswa, SiswaRequest $request)
    {
        
        $input = $request->all();

        // cek apakah ada foto lama di form
        if ($request->hasFile('foto')) {
            // Hapus Foto lama jika ada yang baru
            $this->hapusFoto($siswa);

            // upload foto baru
            $input['foto'] = $this->uploadFoto($request);
        }


        //mengupdate data siswa ke table
        $siswa->update($input);

        // update telepon
        $telepon = $siswa->telepon;
        $telepon->nomor_telepon = $request->input('nomor_telepon');
        $siswa->telepon()->save($telepon);

        // sync table hobi_siswa untuk siswa ini
        $siswa->hobi()->sync($request->input('hobi_siswa'));

        Session::flash('flash_message', 'Data siswa berhasil di update');

        return redirect('siswa');

    }


    public function destroy(Siswa $siswa)
    {
        
        $siswa->delete();
        Session::flash('flash_message', 'Data siswa berhasil dihapus');
        Session::flash('penting', true);
        return redirect('siswa');
    }

    private function uploadFoto(SiswaRequest $request)
    {
        $foto = $request->file('foto');
        $ext = $foto->getClientOriginalExtension();

        if ($request->file('foto')->isValid()) {
            $foto_name = date('YmdHis') . ".$ext";
            $upload_path = 'fotoupload';
            $request->file('foto')->move($upload_path, $foto_name);

            return $foto_name;
        }

        return false;
    }

    private function hapusFoto(Siswa $siswa)
    {

        $exist = Storage::disk('foto')->exists($siswa->foto);

        if (isset($siswa->foto) && $exists) {
            $delete = Storage::disk('foto')->delete($siswa->foto);
            if ($delete){
                return true;
            }
            return false;
        }
    }

    public function cari(Request $request)
    {
        $kata_kunci = $request->input('kata_kunci');
        $query      = Siswa::where('nama_siswa' , 'LIKE' , '%' . $kata_kunci . '%');
        $siswa_list = $query->paginate(2);
        $pagination = $siswa_list->appends($request->except('page'));
        $jumlah_siswa = $siswa_list->total();
        return view('siswa.index', compact('siswa_list', 'kata_kunci', 'pagination', 'jumlah_siswa'));
    }





















    public function tescollection()
    {
        // $data = [
        //     ['nisn' => '1001', 'nama_siswa' => 'Agus Yulianto'],
        //     ['nisn' => '1002', 'nama_siswa' => 'Agustina'],
        //     ['nisn' => '1003', 'nama_siswa' => 'Coy']
        // ];

        $data = Siswa::all()->whereIn('id',['1','2','5']);
        $koleksi = collect($data)->toJson();
        // var_dump($koleksi);
        return $koleksi;
    }

    public function datemutator()
    {
        $siswa = Siswa::findOrFail(7);
        return $siswa->tanggal_lahir->addYears(10)->format('d-m-Y');
    }
}
