<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    //model
    protected $table = 'siswa';  //mengasih tau kepada laravel bahwa tabelnya bukan siswas tapi siswa -> masukan gunakan s diakhir dan bahasa inggris
    protected $fillable = ['nama_depan', 'nama_belakang', 'jenis_kelamin', 'agama', 'alamat']; //fillable untuk masukan ke database
}
