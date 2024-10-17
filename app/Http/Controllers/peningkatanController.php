<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class peningkatanController extends Controller
{
    public function index()
    {
        // Ambil data gabungan dari tabel nama_file_p5, peningkatan, dan file_p5
        $peningkatan = DB::table('nama_file_p5')
            ->join('peningkatans', 'nama_file_p5.id_peningkatan', '=', 'peningkatans.id_peningkatan')
            ->join('file_p5', 'nama_file_p5.id_nfp5', '=', 'file_p5.id_fp5')
            ->select(
                'nama_file_p5.nama_file_p5 as nama_dokumen',
                'peningkatans.id_peningkatan as id_peningkatan',
                'peningkatans.dokumen_p5 as dokumen_p5',
                'file_p5.files as unggahan'
            )
            ->get();

        // Kembalikan data ke view
        return view('User.admin.peningkatan.index_peningkatan', compact('peningkatan'));
    }

    public function store(Request $request)
    {
        try {
            // Validasi input
            $validatedData = $request->validate([
                'namadokumen_p5' => 'required|string',
                'manual_namaDokumen' => 'nullable|string',
                'dokumen_p5' => 'required|string',
                'unggahan_dokumen.*' => 'nullable|mimes:doc,docx,xls,xlsx,pdf|max:2048',
            ]);

            // Menentukan nama dokumen, apakah dari dropdown atau input manual
            $namaDokumen = $validatedData['namadokumen_p5'];
            if ($namaDokumen === 'Dokumen Lainnya' && $request->filled('manual_namaDokumen')) {
                $namaDokumen = $request->input('manual_namaDokumen');
            }

            // Simpan data ke tabel peningkatan menggunakan query builder
            $idPeningkatan = DB::table('peningkatans')->insertGetId([
                'dokumen_p5' => $validatedData['dokumen_p5'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Simpan nama dokumen ke tabel nama_file_p5 dengan id dari peningkatan
            $idnfp5s = DB::table('nama_file_p5')->insertGetId([
                'nama_file_p5' => $namaDokumen,  // Nama dokumen yang disimpan
                'id_peningkatan' => $idPeningkatan,     // Mengambil id_peningkatan dari tabel peningkatan
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Mengupload file dan simpan ke tabel file_p5
            if ($request->hasFile('unggahan_dokumen')) {
                foreach ($request->file('unggahan_dokumen') as $file) {
                    // Simpan file
                    $namaFile = time() . '-' . $file->getClientOriginalName();
                    $file->storeAs('peningkatan', $namaFile, 'public');

                    // Simpan nama file ke tabel file_p5
                    DB::table('file_p5')->insert([
                        'files' => $namaFile,       // Nama file yang diunggah
                        'id_nfp5' => $idnfp5s,   // ID dari nama_file_p5
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            } else {
                // Jika tidak ada file yang diunggah, simpan data dengan field files kosong
                DB::table('file_p5')->insert([
                    'files' => '',            // Field file kosong
                    'id_nfp5' => $idnfp5s, // ID dari nama_file_p5
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // Tampilkan pesan sukses
            Alert::success('success', 'Data peningkatan dan dokumen berhasil ditambahkan.');
            return redirect()->route('peningkatan');  // Ubah dengan route yang sesuai

        } catch (\Exception $e) {
            // Menangkap semua error dan menampilkan pesan kesalahan
            Alert::error('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function edit(String $id_peningkatan)
    {
        try {
            // Ambil data peningkatan berdasarkan id_peningkatan
            $dataPeningkatan = DB::table('peningkatans')
                ->where('id_peningkatan', $id_peningkatan)
                ->first();

            // Ambil data nama_file_p5 berdasarkan id_peningkatan
            $namaFileP5 = DB::table('nama_file_p5')
                ->where('id_peningkatan', $id_peningkatan)
                ->first();

            // Ambil data nama_file_p5 berdasarkan id_peningkatan
            $filep5nya = null;
            if ($namaFileP5) {
                $filep5nya = DB::table('file_p5')
                    ->where('id_nfp5', $namaFileP5->id_nfp5)
                    ->first();
            }

            if (!$namaFileP5) {
                $namaFileP5 = (object) ['nama_file_p5' => ''];
            }

            // Pastikan untuk mengembalikan data lengkap (data peningkatan + nama file peningkatan)
            return view('User.admin.peningkatan.edit_peningkatan', [
                'oldData' => $dataPeningkatan,  // Data peningkatan yang diambil dari tabel peningkatans
                'files' => $filep5nya ? $filep5nya->files : null,
                'namaFileP5' => $namaFileP5->nama_file_p5,  // Mengembalikan nama_file_p5
                'dokumen_p5' => $dataPeningkatan->dokumen_p5,
            ]);

        } catch (\Exception $e) {
            // Menangkap error jika terjadi masalah
            Alert::error('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function update(Request $request, $id_peningkatan)
    {
        try {
            // Validasi input dari form
            $validatedData = $request->validate([
                'unggahan_dokumen.*' => 'nullable|mimes:doc,docx,xls,xlsx,pdf|max:2048',
            ]);

            // Cek apakah ada file baru yang diunggah
            if ($request->hasFile('unggahan_dokumen')) {
                // Hapus file lama jika ada
                DB::table('file_p5')->where('id_fp5', $id_peningkatan)->delete();

                foreach ($request->file('unggahan_dokumen') as $file) {
                    // Simpan file baru
                    $namaFile = time() . '-' . $file->getClientOriginalName();
                    $file->storeAs('peningkatan', $namaFile, 'public');

                    // Simpan nama file ke tabel file_p5
                    DB::table('file_p5')->insert([
                        'files' => $namaFile,       // Nama file yang diunggah
                        'id_fp5' => $id_peningkatan,   // ID dari nama_file_p5
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            } else {
                // Jika tidak ada file baru yang diunggah, file lama tetap digunakan
                $existingFiles = DB::table('file_p5')->where('id_fp5', $id_peningkatan)->get();

                if ($existingFiles->isEmpty()) {
                    // Jika tidak ada file sebelumnya, masukkan data dengan file kosong
                    DB::table('file_p5')->insert([
                        'files' => '',  // Field file kosong
                        'id_fp5' => $id_peningkatan,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }

            // Jika update berhasil
            Alert::success('success', 'Data peningkatan dan dokumen berhasil diperbarui.');
            return redirect()->route('peningkatan');  // Ubah dengan route yang sesuai

        } catch (\Exception $e) {
            // Jika ada error, tampilkan pesan error
            Alert::error('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id_peningkatan)
    {
        try {
            // Ambil semua file yang terkait dengan nama_file_p5 ini
            $files = DB::table('file_p5')->where('id_fp5', $id_peningkatan)->get();
                if (!empty($files)) {
                    // Pastikan file tidak kosong sebelum dihapus
                    Storage::disk('public')->delete('peningkatan/' . $files);
                }
                DB::table('file_p5')->where('id_fp5', $id_peningkatan)->delete();

            // Tampilkan pesan sukses
            Alert::success('success', 'Data peningkatan dan dokumen berhasil dihapus.');
            return redirect()->route('peningkatan');  // Ubah dengan route yang sesuai

        } catch (\Exception $e) {
            // Tampilkan pesan error jika terjadi kesalahan
            Alert::error('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back();
        }
    }

}
