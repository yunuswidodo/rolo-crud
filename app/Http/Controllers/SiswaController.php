<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    //method index untuk menampilkan data dari data base
    public function index(Request $request)
    {
        //dd($request->all());
        /**
         * \App = namespace class Siswa
         * \Siswa = Class Siswa
         */
        if ($request->has('cari')) {
            $data_siswa = \App\Siswa::where('nama_depan', 'LIKE', '%' . $request->cari . '%')->get();   // fungsi mencari data sesuai dengan global variabel
        } else {
            $data_siswa = \App\Siswa::all(); //mengambil dari database ke $data_siswa
        }
        /**
         * ['data_siswa' => $data_siswa] = untuk menampilkan data base ke view
         * string 'data_siswa' harus sama dengan $sata_siswa yang ada diview. cuma tidak dikasih $ 
         */
        return view('siswa.index', ['data_siswa' => $data_siswa]); // tampilkan ke view 
    }

    //method create tambah data
    public function create(Request $request)  // mengambil data yang diinput kemudian return $return->all();
    {
        //return $request->all();
        /**
         * flash seperti data yang dibuat secara temporer hanya dalam satu kali sesi,
         * ketika halaman terbentuk maka muncul flash dan ketika meload data yang lain flash akan hilang
         * flash digunakan memunculkan alert ketika ada tambah data
         * contoh flash = ->with('sukses', 'Data Berhasil Diinut')
         */
        \App\Siswa::create($request->all()); //memasukan kedatabase. diikuti fillable properti di model
        return redirect('/siswa')->with('sukses', 'Data Berhasil Diinput');
    }

    // method edit 
    public function edit($id)  // parameter id diambil dari route
    {
        /**
         * menampung data divariabel $siswa
         * $siswa mempunyai isi yang diambil dari model Siswa
         */
        $siswa = \App\Siswa::find($id);  //find mencari data sesuai dengan yang diklik ( mengambil dari model sebutkan idnya)
        //dd($siswa);   // untuk mengecek data didalam yang klik
        /**
         *view('siswa.edit') bisa pakai slice atau titik
         */
        return view('siswa.edit', ['siswa' => $siswa]); // pasing data
    }
    // method update aksi setelah data di update
    public function update(Request $request, $id) // menangkap data dari form dengan parameter id
    {
        $siswa = \App\Siswa::find($id);
        $siswa->update($request->all());
        return redirect('/siswa')->with('sukses', 'Data Berhasil Diupdate');
    }

    public function delete($id) //param
    {
        $siswa = \App\Siswa::find($id);
        $siswa->delete();
        return redirect('/siswa')->with('sukses', 'Data Berhasil Dihapus');
    }
}
