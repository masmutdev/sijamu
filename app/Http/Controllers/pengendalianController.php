<?php

namespace App\Http\Controllers;

use App\Models\Pengendalian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class pengendalianController extends Controller
{
    public function index()
    {
        // Ambil data gabungan dari tabel nama_file_p4, pengendalian, dan file_p4
        $pengendalian = DB::table('nama_file_p4')
            ->join('pengendalians', 'nama_file_p4.id_pengendalian', '=', 'pengendalians.id_pengendalian')
            ->join('file_p4', 'nama_file_p4.id_fp4', '=', 'file_p4.id_fp4')
            ->select(
                'nama_file_p4.nama_filep4 as nama_dokumen',
                'pengendalians.id_pengendalian as id_pengendalian',
                'pengendalians.bidang_standar as bidang_standar',
                'pengendalians.nama_prodi as nama_prodi',
                'pengendalians.laporan_rtm as laporan_rtm',
                'pengendalians.laporan_rtl as laporan_rtl',
                'file_p4.files as unggahan_rtm',
                'file_p4.files2 as unggahan_rtl',
            )
            ->get();
        // Kembalikan data ke view
        return view('User.admin.Pengendalian.index_pengendalian', compact('pengendalian'));
    }

    public function create()
    {
        return view('User.admin.Pengendalian.tambah_pengendalian');
    }

    public function store(Request $request)
    {
        try {
            // Validasi input
            $validatedData = $request->validate([
                'bidang_standar' => 'required|string',
                'manual_namaDokumen' => 'nullable|string',
                'nama_prodi' => 'nullable|string',
                'laporan_rtm.*' => 'nullable|mimes:doc,docx,xls,xlsx,pdf|max:2048', // Validasi file RTM
                'laporan_rtl.*' => 'nullable|mimes:doc,docx,xls,xlsx,pdf|max:2048', // Validasi file RTL
            ]);

            // Menentukan nama dokumen, apakah dari dropdown atau input manual
            $namaDokumen = $validatedData['bidang_standar'];
            if ($namaDokumen === 'Dokumen Lainnya' && $request->filled('manual_namaDokumen')) {
                $namaDokumen = $request->input('manual_namaDokumen');
            }

            // Simpan data ke tabel pengendalian menggunakan query builder
            $idPengendalian = DB::table('pengendalians')->insertGetId([
                'bidang_standar' => $validatedData['bidang_standar'],
                'nama_prodi' => $validatedData['nama_prodi'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Inisialisasi variabel untuk menyimpan ID dari file yang diupload ke file_p4
            $fileIdRTM = null;
            $fileIdRTL = null;

            // Mengupload file laporan RTM
            if ($request->hasFile('laporan_rtm')) {
                foreach ($request->file('laporan_rtm') as $file) {
                    $namaFileRTM = time() . '-' . $file->getClientOriginalName();
                    $file->storeAs('laporan_rtm', $namaFileRTM, 'public');

                    // Simpan nama file ke tabel file_p4 di kolom 'files' dan ambil id dari insert
                    $fileIdRTM = DB::table('file_p4')->insertGetId([
                        'files' => $namaFileRTM,     // Nama file RTM yang diunggah ke kolom 'files'
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }

            // Mengupload file laporan RTL
            if ($request->hasFile('laporan_rtl')) {
                foreach ($request->file('laporan_rtl') as $file) {
                    $namaFileRTL = time() . '-' . $file->getClientOriginalName();
                    $file->storeAs('laporan_rtl', $namaFileRTL, 'public');

                    // Simpan nama file ke tabel file_p4 di kolom 'files2' dan ambil id dari insert
                    $fileIdRTL = DB::table('file_p4')->insertGetId([
                        'files2' => $namaFileRTL,     // Nama file RTL yang diunggah ke kolom 'files2'
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }

            // Setelah file tersimpan, simpan nama dokumen ke tabel nama_file_p4
            // Pastikan untuk menyimpan dengan file RTM dan RTL yang diunggah ke kolom yang benar
            if ($fileIdRTM) {
                DB::table('nama_file_p4')->insert([
                    'nama_filep4' => $namaDokumen,  // Nama dokumen yang disimpan
                    'id_pengendalian' => $idPengendalian, // Mengambil id_pengendalian dari tabel pengendalian
                    'id_fp4' => $fileIdRTM,            // Mengaitkan dengan file RTM di file_p4 (files)
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            if ($fileIdRTL) {
                DB::table('nama_file_p4')->insert([
                    'nama_filep4' => $namaDokumen,  // Nama dokumen yang disimpan
                    'id_pengendalian' => $idPengendalian, // Mengambil id_pengendalian dari tabel pengendalian
                    'id_fp4' => $fileIdRTL,            // Mengaitkan dengan file RTL di file_p4 (files2)
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // Tampilkan pesan sukses
            Alert::success('success', 'Data pengendalian dan dokumen berhasil ditambahkan.');
            return redirect()->route('pengendalian');  // Ubah dengan route yang sesuai

        } catch (\Exception $e) {
            // Menangkap semua error dan menampilkan pesan kesalahan
            Alert::error('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function lihatdokumenevaluasi($id_pengendalian)
    {
        $pengendalian = Pengendalian::findOrFail($id_pengendalian);
        $filePaths = json_decode($pengendalian->unggahan_dokumen, true);

        if (is_array($filePaths) && !empty($filePaths)) {
            $file = $filePaths[0];

            if (Storage::disk('local')->exists($file)) {
                return response()->file(storage_path('app' . $file));
            } else {
                abort(404, 'File not found.');
            }
        }
    }

    public function edit(String $id_pengendalian)
    {
        try {
            // Ambil data pengendalian berdasarkan id_pengendalian
            $dataPengendalian = DB::table('pengendalians')
                ->where('id_pengendalian', $id_pengendalian)
                ->first();

            // Ambil data nama_file_p4 berdasarkan id_pengendalian
            $namaFileP1 = DB::table('nama_file_p4')
                ->where('id_pengendalian', $id_pengendalian)
                ->first();

            // Ambil data nama_file_p4 berdasarkan id_pengendalian
            $fileP1nya = null;
            if ($namaFileP1) {
                $fileP1nya = DB::table('file_p4')
                    ->where('id_fp4', $namaFileP1->id_nfp4)
                    ->first();
            }

            if (!$namaFileP1) {
                $namaFileP1 = (object) ['nama_filep4' => ''];
            }

            // Pastikan untuk mengembalikan data lengkap (data pengendalian + nama file pengendalian)
            return view('User.admin.pengendalian.edit_pengendalian', [
                'oldData' => $dataPengendalian,  // Data pengendalian yang diambil dari tabel pengendalians
                'files' => $fileP1nya ? $fileP1nya->files : null,
                'namaFileP1' => $namaFileP1->nama_filep4,  // Mengembalikan nama_filep4
                'bidang_standar' => $dataPengendalian->bidang_standar,
                'nama_prodi' => $dataPengendalian->nama_prodi,  // Tanggal terakhir dilakukan
                'laporan_rtm' => $dataPengendalian->laporan_rtm,  // Tanggal diperbarui
                'laporan_rtl' => $dataPengendalian->laporan_rtl,
            ]);

        } catch (\Exception $e) {
            // Menangkap error jika terjadi masalah
            Alert::error('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function update(Request $request, $id_pengendalian)
    {
        try {
            // Validasi input
            $validatedData = $request->validate([
                'bidang_standar' => 'required|string',
                'manual_namaDokumen' => 'nullable|string',
                'nama_prodi' => 'nullable|string',
                'laporan_rtm.*' => 'nullable|mimes:doc,docx,xls,xlsx,pdf|max:2048', // Validasi file RTM
                'laporan_rtl.*' => 'nullable|mimes:doc,docx,xls,xlsx,pdf|max:2048', // Validasi file RTL
            ]);

            // Menentukan nama dokumen, apakah dari dropdown atau input manual
            $namaDokumen = $validatedData['bidang_standar'];
            if ($namaDokumen === 'Dokumen Lainnya' && $request->filled('manual_namaDokumen')) {
                $namaDokumen = $request->input('manual_namaDokumen');
            }

            // Ambil data pengendalian yang ada berdasarkan id_pengendalian
            $pengendalian = DB::table('pengendalians')->where('id_pengendalian', $id_pengendalian)->first();

            if (!$pengendalian) {
                Alert::error('error', 'Data pengendalian tidak ditemukan.');
                return redirect()->route('pengendalian');  // Ubah dengan route yang sesuai
            }

            // Perbarui data di tabel pengendalian
            DB::table('pengendalians')->where('id_pengendalian', $id_pengendalian)->update([
                'bidang_standar' => $validatedData['bidang_standar'],
                'nama_prodi' => $validatedData['nama_prodi'],
                'updated_at' => now(),
            ]);

            // Cari id_fp4 di tabel nama_file_p4 berdasarkan id_pengendalian
            $namaFileRecord = DB::table('nama_file_p4')->where('id_pengendalian', $id_pengendalian)->first();

            if (!$namaFileRecord) {
                Alert::error('error', 'Data nama file tidak ditemukan.');
                return redirect()->route('pengendalian');  // Ubah dengan route yang sesuai
            }

            $id_fp4 = $namaFileRecord->id_fp4;

            // Inisialisasi variabel untuk menyimpan ID file yang baru diunggah
            $fileIdRTM = null;
            $fileIdRTL = null;

            // Cek jika ada file baru di laporan RTM
            if ($request->hasFile('laporan_rtm')) {
                foreach ($request->file('laporan_rtm') as $file) {
                    $namaFileRTM = time() . '-' . $file->getClientOriginalName();
                    $file->storeAs('laporan_rtm', $namaFileRTM, 'public');

                    // Perbarui atau insert file RTM ke kolom files di file_p4
                    DB::table('file_p4')->where('id_fp4', $id_fp4)->update([
                        'files' => $namaFileRTM,
                        'updated_at' => now(),
                    ]);
                }
            }

            // Cek jika ada file baru di laporan RTL
            if ($request->hasFile('laporan_rtl')) {
                foreach ($request->file('laporan_rtl') as $file) {
                    $namaFileRTL = time() . '-' . $file->getClientOriginalName();
                    $file->storeAs('laporan_rtl', $namaFileRTL, 'public');

                    // Perbarui atau insert file RTL ke kolom files2 di file_p4
                    DB::table('file_p4')->where('id_fp4', $id_fp4)->update([
                        'files2' => $namaFileRTL,
                        'updated_at' => now(),
                    ]);
                }
            }

            // Perbarui nama dokumen di tabel nama_file_p4 jika file baru diunggah
            DB::table('nama_file_p4')->where('id_pengendalian', $id_pengendalian)->update([
                'nama_filep4' => $namaDokumen,
                'updated_at' => now(),
            ]);

            // Tampilkan pesan sukses
            Alert::success('success', 'Data pengendalian berhasil diperbarui.');
            return redirect()->route('pengendalian');  // Ubah dengan route yang sesuai

        } catch (\Exception $e) {
            // Menangkap semua error dan menampilkan pesan kesalahan
            Alert::error('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }



    public function destroy($id_pengendalian)
    {
        try {
            // Ambil data nama_file_p4 dan file_p4 yang terkait dengan pengendalian ini
            $namaFileP1 = DB::table('nama_file_p4')->where('id_pengendalian', $id_pengendalian)->first();

            if ($namaFileP1) {
                // Ambil semua file yang terkait dengan nama_file_p4 ini
                $files = DB::table('file_p4')->where('id_fp4', $namaFileP1->id_fp4)->get();

                // Hapus file dari folder penyimpanan
                foreach ($files as $file) {
                    if (!empty($file->files)) {
                        // Pastikan file tidak kosong sebelum dihapus
                        Storage::disk('public')->delete('pengendalian/' . $file->files);
                    }
                }

                // Hapus data dari tabel file_p4
                DB::table('file_p4')->where('id_fp4', $namaFileP1->id_fp4)->delete();

                // Hapus data dari tabel nama_file_p4
                DB::table('nama_file_p4')->where('id_pengendalian', $id_pengendalian)->delete();
            }

            // Hapus data dari tabel pengendalians
            DB::table('pengendalians')->where('id_pengendalian', $id_pengendalian)->delete();

            // Tampilkan pesan sukses
            Alert::success('success', 'Data pengendalian dan dokumen berhasil dihapus.');
            return redirect()->route('pengendalian');  // Ubah dengan route yang sesuai

        } catch (\Exception $e) {
            // Tampilkan pesan error jika terjadi kesalahan
            Alert::error('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back();
        }
    }

}

