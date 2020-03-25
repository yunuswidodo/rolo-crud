@extends('layouts.master')

@section('content')
    <div class="main">
      <div class="main-content">
        
        @if(session('sukses'))  <!--sukses mengambil dari SiswaController -->
        <div class="alert alert-success" role="alert">
            {{session('sukses')}}  <!--bisa langsung hardcode(message yang diingikan) -->
        </div>
        @endif
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Inputs</h3>
								</div>
								<div class="panel-body">
                  <form action="/siswa/{{$siswa->id}}/update" method="POST">   <!--update mengambil dari route -->
                    <!-- $siswa adalah siswa yang ada di model  -->
                     {{csrf_field()}}  <!--wajib ada  helper laravel-->
                     <div class="form-group">
                       <label for="exampleInputEmail1">Nama Depan</label>
                       <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="Nama Depan"
                         placeholder="nama depan" value="{{$siswa->nama_depan}}">  <!--ambil dari SiswaControler -->
                     </div>
                     <div class="form-group">
                       <label for="exampleInputEmail1">Nama Belakang</label>
                       <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="Nama Belakang"
                     placeholder="nama belakang" value="{{$siswa->nama_belakang}}">
                     </div>
                    
                     <div class="form-group">
                         <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                         <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                           <option value="Laki-laki" @if($siswa->jenis_kelamin == 'Laki-Laki') selected @endif>Laki-Laki</option> <!-- penelusan value sesuakan sama yang didatabase -->
                           <option value="Perempuan" @if($siswa->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>                                    
                         </select>
                     </div>
                     <div class="form-group">
                         <label for="exampleInputEmail1">Agama</label>
                         <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="Agama"
                         placeholder="agama" value="{{$siswa->agama}}">
                     </div>
                     <div class="form-group">
                         <label for="exampleFormControlTextarea1">Alamat</label>
                     <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$siswa->alamat}}</textarea> <!--jika ditext area langsung ditulis ditext area -->
                     </div>   
                     <button type="submit" class="btn btn-warning">Update</button>
                     </form>
								</div>
							</div>
            </div>
          </div>
        </div>
      </div>
    </div>
@stop


@section('content1') <!-- ambil dari master -->

        <h1>Edit Data Siswa</h1>
        @if(session('sukses'))  <!--sukses mengambil dari SiswaController -->
        <div class="alert alert-success" role="alert">
            {{session('sukses')}}  <!--bisa langsung hardcode(message yang diingikan) -->
        </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
            <form action="/siswa/{{$siswa->id}}/update" method="POST">   <!--update mengambil dari route -->
               <!-- $siswa adalah siswa yang ada di model  -->
                {{csrf_field()}}  <!--wajib ada  helper laravel-->
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Depan</label>
                  <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="Nama Depan"
                    placeholder="nama depan" value="{{$siswa->nama_depan}}">  <!--ambil dari SiswaControler -->
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Belakang</label>
                  <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="Nama Belakang"
                placeholder="nama belakang" value="{{$siswa->nama_belakang}}">
                </div>
               
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                      <option value="Laki-laki" @if($siswa->jenis_kelamin == 'Laki-Laki') selected @endif>Laki-Laki</option> <!-- penelusan value sesuakan sama yang didatabase -->
                      <option value="Perempuan" @if($siswa->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>                                    
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Agama</label>
                    <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="Agama"
                    placeholder="agama" value="{{$siswa->agama}}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Alamat</label>
                <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$siswa->alamat}}</textarea> <!--jika ditext area langsung ditulis ditext area -->
                </div>   
                <button type="submit" class="btn btn-warning">Update</button>
                </form>
            </div>
                      
        </div>
   
        @endsection