@extends('layouts.layout')
@section('konten')

<body>
    <div class="container">
        

        <div class="row">
            <div class="col-md-12">
                <h5 class="card-header text-center white-text py-4 mb-4" style="background-color: #0059AB;">
                    <strong class="text-white">Ubah Data Kelola Mahasiswa</strong>
                </h5>
                <div class="card-body">
                    <form action="/dashboardUpdate_KelolaMahasiswa/{{$data->mhs_username}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label" style="font-weight: bold;">Username</label>
                            <input type="text" name="mhs_username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->mhs_username}}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label" style="font-weight: bold;">Nama</label>
                            <input type="text" name="mhs_nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->mhs_nama}}">
                            @error('mhs_nama')
                            <span class="text-danger">Tahun Ajaran tidak boleh kosong</span><br>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label" style="font-weight: bold;">Password</label>
                            <input type="text" name="mhs_password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->mhs_password}}">
                            @error('mhs_password')
                            <span class="text-danger">Status tidak boleh kosong</span><br>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" title="Submit">Ubah</button>
                                <a href="/dashboardaKelolaMahasiswa" class="btn btn-secondary">
                                    <i class="fa fa-arrow-left"></i> Kembali
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
