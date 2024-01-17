<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\msmahasiswa;
use App\Models\mstahunajaran;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $title = 'Dashboard Koordinasi TA';
        return view('Dashboard.index', compact('title'));
    }
    public function HASIL_SIDANG()
    {
        $title = 'Dashboard Hasil Sidang';
        return view('Dashboard.Hasil_sidang.index', compact('title'));
    }
    //TAHUN AJARAN
    public function Kelola_tahun_ajaran(Request $request)
    {
        if ($request->has('search')) {
            $data = mstahunajaran::where('thn_id', 'LIKE', '%' . $request->search . '%')->paginate(5);
            $title = 'Pencarian: "' . $request->search . '"';
        } else {
            $data = mstahunajaran::paginate(5);
            $title = 'Kelola Tahun Ajaran';
        }

        // Tambahkan 'data' ke metode compact
        return view('Dashboard.Kelola_tahun_ajaran.index', compact('data', 'title'));
    }
    public function Create_tahun_ajaran()
    {
        $title = 'kategori Tahun Ajaran / Tambah';
        return view('Dashboard.Kelola_tahun_ajaran.Create', compact('title'));
    }

    public function insertdata_tahun_ajaran(Request $request)
    {
        // Validasi input
        $request->validate([
            'thn_tahunajaran' => 'required',
            'thn_status' => 'required',
        ]);

        // Menambahkan mkp_id ke dalam data yang akan di-create
        $data = [
            'thn_id' => $request->thn_id,  // Pastikan nilai 'thn_id' disertakan
            'mkp_id' => $request->mkp_id,
            'thn_tahunajaran' => $request->thn_tahunajaran,
            'thn_status' => $request->thn_status,
        ];

        // Menggunakan create untuk menyimpan data ke dalam database
        mstahunajaran::create($data);

        return redirect()->route('dashboardKelola_tahun_ajaran.Kelola_tahun_ajaran')->with('success', 'Data Berhasil Ditambah');
    }
    public function Edit_tahun_ajaran($thn_id)
    {
        $data = mstahunajaran::find($thn_id);
        $title = 'Tahun Ajaran / Edit';
        return view('Dashboard.Kelola_tahun_ajaran.Edit', compact('data', 'title'));
    }

    public function updatedata_tahun_ajaran(Request $request, $thn_id)
    {
        $request->validate([
            'thn_tahunajaran' => 'required',
            'thn_status' => 'required',
        ], [
            'thn_tahunajaran.required' => 'Tahun Ajaran is required.',
            'thn_status.required' => 'Status is required.',
        ]);

        $data = mstahunajaran::find($thn_id);

        if (!$data) {
            return redirect()->route('dashboardKelola_tahun_ajaran.Kelola_tahun_ajaran')->with('error', 'Data not found.');
        }

        $data->update($request->all());

        return redirect()->route('dashboardKelola_tahun_ajaran.Kelola_tahun_ajaran')->with('success', 'Data Berhasil Diupdate');
    }
    public function delete_tahun_ajaran($id)
    {
        $data = mstahunajaran::find($id);
        $data->delete();
        return redirect()->route('dashboardKelola_tahun_ajaran.Kelola_tahun_ajaran')->with('success', 'Data Berhasil DI Hapus');
    }




    public function Penilaian_sidang_TA()
    {
        $title = 'Dashboard Penilaian Sidang TA';
        return view('Dashboard.Penilaian_sidang_TA.index', compact('title'));
    }
    public function Sidang_BAP_TA()
    {
        $title = 'Dashboard Sidang BAP TA';
        return view('Dashboard.Sidang_BAP_TA.index', compact('title'));
    }
    public function Kelola_Mahasiswa(Request $request)
    {

        if ($request->has('search')) {
            $data = msmahasiswa::where('mhs_username', 'LIKE', '%' . $request->search . '%')->paginate(5);
            $title = 'Kelola Mahasiswa';
        } else {
            $data = msmahasiswa::paginate(5);
            $title = 'Kelola Mahasiswa';
        }

        // Tambahkan 'data' ke metode compact
        return view('Dashboard.Kelola_Mahasiswa.index', compact('data', 'title'));
    }
    public function Create_Kelola_Mahasiswa()
    {
        $title = 'Kelola Mahasiswa / Tambah Kelola Mahasiswa ';
        return view('Dashboard.Kelola_Mahasiswa.Create', compact('title'));
    }
    public function insertdata_Kelola_Mahasiswa(Request $request)
    {
        // Validasi input
        $request->validate([
            'mhs_nama' => 'required',
            'mhs_password' => 'required',
        ]);

        // Hash password sebelum disimpan ke database
        $hashedPassword = password_hash($request->mhs_password, PASSWORD_DEFAULT);

        // Menambahkan mkp_id ke dalam data yang akan di-create
        $data = [
            'mhs_username' => $request->mhs_username,
            'mkp_id' => $request->mkp_id,
            'mhs_nama' => $request->mhs_nama,
            'mhs_password' => $hashedPassword, // Menyimpan password yang sudah di-hash
        ];

        // Menggunakan create untuk menyimpan data ke dalam database
        msmahasiswa::create($data);

        return redirect()->route('dashboardaKelolaMahasiswa.Kelola_Mahasiswa')->with('success', 'Data Berhasil Ditambah');
    }
    public function Edit_kelola_Mahasiswa($mhs_username)
    {
        $data = msmahasiswa::find($mhs_username);
        $title = 'Kelola Mahasiswa / Edit Mahasiswa';
        return view('Dashboard.Kelola_Mahasiswa.Edit', compact('data', 'title'));
    }
    public function updatedata_Kelola_Mahasiswa(Request $request, $mhs_username)
    {
        $request->validate([
            'mhs_nama' => 'required',
            'mhs_password' => 'required',
        ], [
            'mhs_nama.required' => 'Tahun Ajaran is required.',
            'mhs_password.required' => 'Status is required.',
        ]);

        $data = msmahasiswa::find($mhs_username);

        if (!$data) {
            return redirect()->route('dashboardaKelolaMahasiswa.Kelola_Mahasiswa')->with('error', 'Data not found.');
        }

        $data->update($request->all());

        return redirect()->route('dashboardaKelolaMahasiswa.Kelola_Mahasiswa')->with('success', 'Data Berhasil Diupdate');
    }
    public function delete_kelola_mahasiswa($id)
    {
        $data = msmahasiswa::find($id);
        $data->delete();
        return redirect()->route('dashboardaKelolaMahasiswa.Kelola_Mahasiswa')->with('success', 'Data Berhasil DI Hapus');
    }
}
