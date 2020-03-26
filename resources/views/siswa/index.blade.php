@extends('layouts.master')
@section('content')

    <div class="main">
        @if(session('sukses'))  <!--sukses mengambil dari SiswaController -->
        <div class="alert alert-success" role="alert">
            {{session('sukses')}}  <!--bisa langsung hardcode(message yang diingikan) -->
        </div>
        @endif
        <div class="main-content">
            <div class="container-fluid">
                <div class="col-md-12">
                    <!-- TABLE HOVER -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data Siswa</h3>
                            <div class="right">
                                <!-- Button trigger modal -->
                            <button type="button" class="btn" data-toggle="modal" data-target="#cobaModal">
                                <i class="lnr lnr-plus-circle"></i>
                            </button>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>NAMA DEPAN</th>
                                        <th>NAMA BELAKANG</th>
                                        <th>JENIS KELAMIN</th>
                                        <th>AGAMA</th>
                                        <th>ALAMAT</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_siswa as $siswa)   <!--$data_siswa mengambil dari data_siswa yang ada di route  -->
                                    <tr>
                                    <td><a href="/siswa/{{$siswa->id}}/profile">{{$siswa->nama_depan}}</a></td> <!--href supaya item bisa diklik -->
                                    <td><a href="/siswa/{{$siswa->id}}/profile">{{$siswa->nama_belakang}}</a></td>
                                      <td>{{$siswa->jenis_kelamin}}</td>
                                      <td>{{$siswa->agama}}</td>
                                      <td>{{$siswa->alamat}}</td>
                                      <td>
                                        <a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning btn-sm">aksi</a>
                                        <a href="/siswa/{{$siswa->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('yakin mau dihapus')">delete</a>
                                      </td> 
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END TABLE HOVER -->
                </div>

            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="cobaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form action="/siswa/create" method="POST"> <!--/siswa/create adalah route  -->
                        {{csrf_field()}}  <!--wajib ada  helper laravel-->
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nama Depan</label>
                          <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="Nama Depan">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nama Belakang</label>
                          <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="Nama Belakang">
                        </div>
                       
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                              <option>Laki Laki</option>
                              <option>Perempuan</option>                                    
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Agama</label>
                            <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="Agama">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Alamat</label>
                            <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>   
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@stop

@section('content1')

        @if(session('sukses'))  <!--sukses mengambil dari SiswaController -->
        <div class="alert alert-success" role="alert">
            {{session('sukses')}}  <!--bisa langsung hardcode(message yang diingikan) -->
        </div>
        @endif
        <div class="row">
            <div class="col-6">
                <h1>data siswa</h1>
            </div>
            <div class="col-6">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#cobaModal">
                    Tambah data siswa
                </button>
    
            </div>
            
            <table class="table table-hover">
                <tr>
                    <th>NAMA DEPAN</th>
                    <th>NAMA BELAKANG</th>
                    <th>JENIS KELAMIN</th>
                    <th>AGAMA</th>
                    <th>ALAMAT</th>
                    <th>AKSI</th>
                   </tr>
                   @foreach ($data_siswa as $siswa)   <!--$data_siswa mengambil dari data_siswa yang ada di route  -->
                   <tr>
                   <td>{{$siswa->nama_depan}}</td>
                   <td>{{$siswa->nama_belakang}}</td>
                   <td>{{$siswa->jenis_kelamin}}</td>
                   <td>{{$siswa->agama}}</td>
                   <td>{{$siswa->alamat}}</td>
                   <td>
                       <a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning btn-sm">aksi</a>
                       <a href="/siswa/{{$siswa->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('yakin mau dihapus')">delete</a>
                    </td> 
                   </tr>
                   @endforeach
               </table>           
        </div>
    
               
                <!-- Modal -->
                <div class="modal fade" id="cobaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <form action="/siswa/create" method="POST"> <!--/siswa/create adalah route  -->
                                {{csrf_field()}}  <!--wajib ada  helper laravel-->
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Nama Depan</label>
                                  <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="Nama Depan">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Nama Belakang</label>
                                  <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="Nama Belakang">
                                </div>
                               
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                                      <option>Laki Laki</option>
                                      <option>Perempuan</option>                                    
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Agama</label>
                                    <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="Agama">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Alamat</label>
                                    <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>   
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
   

                @endsection