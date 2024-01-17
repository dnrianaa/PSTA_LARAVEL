@extends('layouts.layout')
@section('konten')

<body>
<div class="container">
        <center>
            <span style="font-size: Larger; font-weight: bold;">Data Kelola Mahasiswa</span>
        </center><br>

        <div class="row mb-3">
            <div class="col-6 d-flex align-items-center">
                <a href="dashboardTambahKelolaMahasiswa" class="btn btn-primary" style="padding: 5px 5px; font-size: 13px;">+Tambah Data</a>
            </div>
            <div class="col-6 d-flex align-items-center ml-auto">
                <form action="/dashboardaKelolaMahasiswa" method="GET" class="d-flex">
                    <input type="search" name="search" class="form-control" placeholder="Cari id..." aria-label="Search" aria-describedby="basic-addon2">
                </form>
            </div>
        </div>


        
        
        @if($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
        @endif
       

        <table id="Kelola_mahasiswa" class="table datable" width="100%">
            <thead>
                <tr>
                    <th class="align-middle text-center">No.</th>
                    <th class="align-middle text-center">username </th>
                    <th class="align-middle text-center">nama</th>
                    <th class="align-middle text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no = 1;
                @endphp
                @foreach($data as $Kelola_mahasiswa => $row)
                <tr>
                    <th  class="align-middle text-center"scope="row">{{ $Kelola_mahasiswa + $data->firstItem() }}</th>
                    <td class="align-middle text-center">{{ $row->mhs_username}}</td>
                    <td class="align-middle text-center">{{ $row->mhs_nama }}</td>
                    <td  class="align-middle text-center">
                        <a href="/dashboardEditKelolaMahasiswa/{{ $row->mhs_username }}" class="btn btn-info center" style="padding: 5px 5px; font-size: 10px;"name="Edit.pebinbing_pengguna">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" class="btn btn-danger delete-button center" style="padding: 5px 5px; font-size: 10px;"
                            data-id="{{ $row->mhs_username }}" data-mhs_username="{{ $row->mhs_username }}">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$data->links()}}
    </div>

    <!-- Script untuk meng-handle SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('.delete-button').click(function () {
            var mhs_username = $(this).attr('data-id');
            var mhs_username = $(this).attr('data-mhs_username');

            Swal.fire({
                title: "Yakin?",
                text: "Kamu akan menghapus data dengan Nama " + mhs_username,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Hapus!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/dashboardDelete_KelolaMahasiswa/" + mhs_username + ""
                    Swal.fire(
                        "Terhapus!",
                        "Data telah dihapus.",
                        "success"
                    );
                }
            });
        });
    </script>
    
</body>
@endsection
