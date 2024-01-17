@extends('layouts.layout')

@section('konten')

<body>

    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h5 class="card-header text-center white-text py-4 mb-4" style="background-color: #0059AB;">
                        <strong class="text-white">Tambah Data Kelola Mahasiswa</strong>
                    </h5>

                    <div class="card-body">
                        <form action="/dashboardinsertdataKelolaMahasiswa" method="POST" enctype="multipart/form-data">
                            @csrf

                            <?php

use App\Models\msmahasiswa;

function generateAutomaticID($prefix = '032024')
{
    // Mengambil ID terakhir dari database
    $lastID = msmahasiswa::latest('mhs_username')->value('mhs_username');

    // Mengambil angka dari ID terakhir dan menambahkannya dengan 1
    $lastNumber = (int)substr($lastID, strlen($prefix));
    $newNumber = $lastNumber + 1;

    // Menggunakan sprintf untuk memformat ID baru
    $newID = sprintf('%s%03d', $prefix, $newNumber);

    return $newID;
}

// ...

// Periksa apakah $mhs_username kosong atau tidak diatur
if (empty($mhs_username)) {
    // Buat ID baru jika $mhs_username kosong
    $mhs_username = generateAutomaticID();
}

                            ?>


                            <div class="mb-3">
                                <label for="mhs_username" class="form-label" style="font-weight: bold;">Username <span style="color: red;">*</span></label>
                                <input type="text" name="mhs_username" value="{{ $mhs_username }}" class="form-control" id="mhs_username" aria-describedby="emailHelp" readonly>
                                @error('mhs_username')
                                <span class="text-danger">{{ $message }}</span><br>
                                @enderror
                            </div>       
                                <div class="mb-3">
                                    <label for="mhs_nama" class="form-label" style="font-weight: bold;">Nama<span style="color: red;">*</span></label>
                                    <input type="text" name="mhs_nama" value="" class="form-control" id="mhs_nama" aria-describedby="emailHelp">
                                    @error('mhs_nama')
                                    <span class="text-danger">Nama tidak boleh kosong</span><br>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="mhs_password" class="form-label" style="font-weight: bold;">Password<span style="color: red;">*</span></label>
                                    <input type="text" name="mhs_password" value="" class="form-control" id="mhs_password" aria-describedby="emailHelp">
                                    @error('mhs_password')
                                    <span class="text-danger">Jabatan tidak boleh kosong</span><br>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary" title="Submit">Submit</button>
                                    </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection