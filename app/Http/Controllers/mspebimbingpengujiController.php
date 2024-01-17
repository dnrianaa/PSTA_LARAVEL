<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\mspebimbingpenguji;
use App\Models\mspengguna;
use Illuminate\Http\Request;

class mspebimbingpengujiController extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = mspebimbingpenguji::where('pbn_id', 'LIKE', '%' . $request->search . '%')->paginate(5);
            $title = 'Pencarian: "' . $request->search . '"';
        } else {
            $data = mspebimbingpenguji::paginate(5);
            $title = 'Pebimbing & Penguji';
        }
    
        return view('Dashboard.Pebimbing_Pengguna.Index', compact('title', 'data'));
    }
    
    public function create_pebinbing_pengguna()
    {
        $usernames = mspengguna::all();
        $title = 'Pebimbing & Penguji / Tambah';
        $pengujiUsernames = mspebimbingpenguji::pluck('png_username', 'png_username');
        $pbnIds = mspebimbingpenguji::pluck('pbn_id', 'pbn_id'); // Menambahkan pbn_id ke dalam array
    
        return view('Dashboard.Pebimbing_Pengguna.Create', compact('title', 'pengujiUsernames', 'usernames', 'pbnIds'));
    }
    


    public function insertdata_pebinbing_pengguna(Request $request)
{
    // Validasi input
    $request->validate([
        'pbn_jenis' => 'required',
        'pbn_nama' => 'required',
        'pbn_jabatan' => 'required',
        'pbn_email' => 'required|email', // Validasi email
        'png_username' => 'required',
    ]);

    // Mendapatkan pbn_id baru dengan menggunakan fungsi generateAutomaticID
    $newPbnId = $this->generateUniqueAutomaticID();

    // Gunakan try-catch untuk menangani kesalahan jika terjadi
    try {
        mspebimbingpenguji::create([
            'pbn_id' => $newPbnId,
            'pbn_jenis' => $request->pbn_jenis,
            'pbn_nama' => $request->pbn_nama,
            'pbn_jabatan' => $request->pbn_jabatan,
            'pbn_email' => $request->pbn_email,
            'png_username' => $request->png_username,
        ]);

        // Redirect dengan pesan success
        return redirect()->route('Pebimbing_pengguna')->with('success', 'Data Berhasil Ditambah');
    } catch (\Illuminate\Database\QueryException $ex) {
        // Tampilkan pesan kesalahan jika 'pbn_id' sudah ada
        return redirect()->route('Pebimbing_pengguna')->with('error', 'Gagal menambahkan data. PBN ID sudah ada.');
    }
}


public function generateUniqueAutomaticID($prefix = 'PBN')
{
    // Menggunakan Eloquent untuk menghitung jumlah baris
    $jumlahisi = mspebimbingpenguji::count();

    // Menambahkannya dengan 1
    $hasil = $jumlahisi + 1;

    // Menggunakan sprintf untuk memformat ID
    $id = sprintf('%s%03d', $prefix, $hasil);

    // Memastikan 'pbn_id' yang dihasilkan unik
    while (mspebimbingpenguji::where('pbn_id', $id)->exists()) {
        $hasil++;
        $id = sprintf('%s%03d', $prefix, $hasil);
    }

    return $id;
}

    

    public function Edit_pebinbing_pengguna($pbn_id)
    {
        $usernames = mspengguna::all();
        $pengujiUsernames = mspebimbingpenguji::pluck('png_username', 'png_username');
        $data = mspebimbingpenguji::find($pbn_id);
        $title = 'Kategori penilaian/Edit';
        return view('Dashboard.Pebimbing_pengguna.Edit', compact('data', 'title','pengujiUsernames','usernames'));
    }
    public function updatedata_pebinbing_pengguna(Request $request, $pbn_id)
    {
        $request->validate([
            'pbn_id' => 'required',
            'pbn_jenis' => 'required',
            'pbn_nama' => 'required',
            'pbn_jabatan' => 'required',
            'pbn_email' => 'required',
            'png_username' => 'required',
        ], [
            'pbn_id.required' => 'ID is required.',
            'pbn_jenis.required' => 'Nama is required.',
            'pbn_nama.required' => 'Bobot is required.',
            'pbn_jabatan.required' => 'Bobot is required.',
            'pbn_email.required' => 'Bobot is required.',
            'png_username.required' => 'Bobot is required.',
        ]);


        $data = mspebimbingpenguji::find($pbn_id);
        $data->update($request->all());
        return redirect()->route('Pebimbing_pengguna')->with('success', 'Data Berhasil DI Update');
    }
    public function delete_pebinbing_pengguna($pbn_id)
    {
        $data = mspebimbingpenguji::find($pbn_id);
        $data->delete();
        return redirect()->route('Pebimbing_pengguna')->with('success', 'Data Berhasil DI Hapus');
    }
}
