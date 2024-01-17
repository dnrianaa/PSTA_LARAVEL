@extends('layouts.layout')
@section('konten')

<body>
    <div class="container">
        <center>
            <span style="font-size: Larger; font-weight: bold;">Ubah Data Tahun Ajaran</span>
        </center><br>

        <div class="row">
            <div class="col-md-12">
                <h5 class="card-header text-center white-text py-4 mb-4" style="background-color: #0059AB;">
                    <strong class="text-white">Ubah Data Tahun Ajaran</strong>
                </h5>
                <div class="card-body">
                    <form action="/updatedata_tahun_ajaran/{{$data->thn_id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label" style="font-weight: bold;">ID Tahun Ajaran</label>
                            <input type="text" name="thn_id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->thn_id}}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label" style="font-weight: bold;">Tahun Ajaran</label>
                            <input type="text" name="thn_tahunajaran" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->thn_tahunajaran}}">
                            @error('thn_tahunajaran')
                            <span class="text-danger">Tahun Ajaran tidak boleh kosong</span><br>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label" style="font-weight: bold;">Status</label>
                            <input type="text" name="thn_status" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->thn_status}}">
                            @error('thn_status')
                            <span class="text-danger">Status tidak boleh kosong</span><br>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" title="Submit">Ubah</button>
                                <a href="/Kelola_tahun_ajaran" class="btn btn-secondary">
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
