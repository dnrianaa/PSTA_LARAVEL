@extends('layouts.layout')
@section('konten')

<body>
<div class="container">
        <center>
            <span style="font-size: Larger; font-weight: bold;">Data Kelola Tahun Ajaran</span>
        </center><br>

        <div class="row mb-3">
            <div class="col-6 d-flex align-items-center">
                <a href="dashboardKTamabah_tahun_ajaran" class="btn btn-primary" style="padding: 5px 5px; font-size: 13px;">+Tambah Data</a>
            </div>
            <div class="col-6 d-flex align-items-center ml-auto">
                <form action="/dashboardKTamabah_tahun_ajaran" method="GET" class="d-flex">
                    <input type="search" name="search" class="form-control" placeholder="Cari id..." aria-label="Search" aria-describedby="basic-addon2">
                </form>
            </div>
        </div>


        
        
        @if($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
        @endif
       

        <table id="tahun_ajaran" class="table datable" width="100%">
            <thead>
                <tr>
                    <th class="align-middle text-center">No.</th>
                    <th class="align-middle text-center">ID Tahun Ajaran </th>
                    <th class="align-middle text-center">Tahun Ajaran</th>
                    <th class="align-middle text-center">Status </th>
                    <th class="align-middle text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no = 1;
                @endphp
                @foreach($data as $Kelola_tahun_ajaran => $row)
                <tr>
                    <th  class="align-middle text-center"scope="row">{{ $Kelola_tahun_ajaran + $data->firstItem() }}</th>
                    <td class="align-middle text-center">{{ $row->thn_id}}</td>
                    <td class="align-middle text-center">{{ $row->thn_tahunajaran }}</td>
                    <td class="align-middle text-center">{{ $row->thn_status }}</td>
                    <td  class="align-middle text-center">
                        <a href="/dashboardKEdit_tahun_ajaran/{{ $row->thn_id }}" class="btn btn-info center" style="padding: 5px 5px; font-size: 10px;"name="Edit.pebinbing_pengguna">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" class="btn btn-danger delete-button center" style="padding: 5px 5px; font-size: 10px;"
                            data-id="{{ $row->thn_id }}" data-thn_status="{{ $row->thn_status }}">
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
            var thn_id = $(this).attr('data-id');
            var thn_status = $(this).attr('data-thn_status');

            Swal.fire({
                title: "Yakin?",
                text: "Kamu akan menghapus data dengan Nama " + thn_status,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Hapus!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/delete_tahun_ajaran/" + thn_id + ""
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
