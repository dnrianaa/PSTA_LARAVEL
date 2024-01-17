@extends('layouts.layout')

@section('konten')

<body>

    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h5 class="card-header text-center white-text py-4 mb-4" style="background-color: #0059AB;">
                        <strong class="text-white">Tambah Data Tahun Ajaran</strong>
                    </h5>

                    <div class="card-body">
                        <form action="/dashboardKInsert_tahun_ajaran" method="POST" enctype="multipart/form-data">
                            @csrf

                            <?php

                            use App\Models\mstahunajaran; // Sesuaikan namespace dan path model yang sesuai

                            // Anggap $mkp_id adalah ID yang sudah ada atau diambil dari suatu sumber

                            // Fungsi untuk membuat ID baru
                            function generateAutomaticID($prefix = 'THN')
                            {
                                // Menggunakan Eloquent untuk menghitung jumlah baris
                                $jumlahisi = mstahunajaran::count();

                                // Menambahkannya dengan 1
                                $hasil = $jumlahisi + 1;

                                // Menggunakan sprintf untuk memformat ID
                                $id = sprintf('%s%03d', $prefix, $hasil);

                                return $id;
                            }

                            // Periksa apakah $mkp_id kosong atau tidak diatur
                            if (empty($thn_id)) {
                                // Buat ID baru jika $mkp_id kosong
                                $thn_id = generateAutomaticID();
                            }
                            ?>


                            <div class="mb-3">
                                <input type="hidden" name="thn_id" value="{{ $thn_id }}" class="form-control" id="thn_id" aria-describedby="emailHelp" readonly>
                                @error('thn_id')
                                <span class="text-danger">{{ $message }}</span><br>
                                @enderror
                            </div>       
                                <div class="mb-3">
                                    <label for="thn_tahunajaran" class="form-label" style="font-weight: bold;">Tahun ajaran<span style="color: red;">*</span></label>
                                    <input type="text" name="thn_tahunajaran" value="" class="form-control" id="thn_tahunajaran" aria-describedby="emailHelp">
                                    @error('thn_tahunajaran')
                                    <span class="text-danger">Nama tidak boleh kosong</span><br>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="thn_status" class="form-label" style="font-weight: bold;">Status<span style="color: red;">*</span></label>
                                    <input type="text" name="thn_status" value="" class="form-control" id="pbn_jenis" aria-describedby="emailHelp">
                                    @error('thn_status')
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