@extends('layouts.master');

@section('content')
   
@if (session("sukses"))
   <div class="alert alert-success" role="alert">
      {{ session("sukses") }}
    </div>
@endif
<div class="row">
   
   <div class="col-6">
      <h1>Data Siswa</h1>

   </div>

   <div class="col-6">

      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
         Tambah Data Siswa
      </button>
      

   </div>

   <table class="table table-hover">
      <tr>
         <th>Nama Depan</th>
         <th>Nama Belakang</th>
         <th>Jenis Kelamin</th>
         <th>Agama</th>
         <th>Alamat</th>
         <th>Aksi</th>
      </tr>
      @foreach ($data_siswa as $siswa)
         <tr>
            <td>{{ $siswa->nama_depan }}</td>
            <td>{{ $siswa->nama_belakang }}</td>
            <td>{{ $siswa->jenis_kelamin }}</td>
            <td>{{ $siswa->agama }}</td>
            <td>{{ $siswa->alamat }}</td>
            <td>
               <a
                  href="/siswa/{{ $siswa->id }}/edit"
                  class="btn btn-warning btn-sm"
               >
                  Edit
               </a>
            </td>
         </tr>
      @endforeach
   </table>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
   <div class="modal-content">
      <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Tambah Siswa</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
      </div>
      <div class="modal-body">
         <!-- form -->
         <form action="/siswa/create" method="POST">
            @csrf
            <div class="form-group">
               <label for="exampleInputEmail1">Nama Depan</label>
               <input
                  name="nama_depan" 
                  placeholder="Nama Depan" 
                  type="text" 
                  class="form-control" 
                  id="exampleInputEmail1" >
            </div>

            <div class="form-group">
              <label for="namaBelakang">Nama Belakang</label>
              <input 
                  name="nama_belakang"
                  placeholder="Nama Belakang" 
                  type="text" 
                  class="form-control" 
                  id="namaBelakang">
            </div>

            <div class="form-group">
               <label for="jk">Jenis Kelamin</label>
               <select name="jenis_kelamin" class="form-control" id="jk">
                  <option value="L">Laki-laki</option>
                  <option value="P">Perempuan</option>
                </select>
            </div>

            <div class="form-group">
               <label for="agama">Agama</label>
               <input
                  name="agama" 
                  placeholder="Agama" 
                  type="text" 
                  class="form-control" 
                  id="agama">
            </div>

            <div class="form-group">
               <label for="exampleFormControlTextarea1">Alamat</label>
               <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
             </div>
             
             <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
             </div>

          </form>

      </div>


   </div>
   </div>
</div>
@endsection

