<?php

namespace App\Http\Controllers;

use App\Models\FileP1;
use App\Models\Penetapan;
use App\Models\NamaFileP1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Console\StorageLinkCommand;

class perangkatController extends Controller
{
    public function index()
    {

        // Mengambil data dari tabel penetapans dengan join ke nama_file_p1 dan file_p1
        $dokumenp1 = DB::table('penetapans')
        ->select(
            'penetapans.id_penetapan',
            'penetapans.submenu_penetapan',
            'penetapans.id_nfp1',
            'penetapans.id_fp1',
            'nama_file_p1.nama_filep1',  // Ambil nama_filep1 dari tabel nama_file_p1
            'file_p1.files'  // Ambil files dari tabel file_p1
        )
        ->join('nama_file_p1', 'penetapans.id_nfp1', '=', 'nama_file_p1.id_nfp1')  // Join ke nama_file_p1 berdasarkan id_nfp1
        ->join('file_p1', 'penetapans.id_fp1', '=', 'file_p1.id_fp1')  // Join ke file_p1 berdasarkan id_fp1
        ->where('submenu_penetapan', 'perangkatspmi')
        ->get();

        return view('User.admin.Penetapan.perangkatspmi', compact('dokumenp1'));
    }

    public function create()  //tombol Tambah
    {
        return view('User.admin.Penetapan.tambah_perangkatspmi');
    }

    public function store(Request $request)
    {
        try {
            // Validasi input
            $validatedData = $request->validate([
                'submenu_penetapan' => 'required|in:perangkatspmi',
                'nama_filep1' => 'required|string',
                'files.*' => 'nullable|mimes:doc,docx,xls,xlsx,pdf|max:2048',
            ]);

            // Simpan file-file
            if ($request->hasFile('files')) {
                foreach ($request->file('files') as $file) {
                    $namaDokumen = time() . '-' . $file->getClientOriginalName();
                    $path = $file->storeAs('perangkatspmi', $namaDokumen, 'public');

                    // Simpan data file ke tabel FileP1 menggunakan query builder
                    $fileP1Id = DB::table('file_p1')->insertGetId([
                        'files' => $namaDokumen,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);

                    // Simpan data ke tabel NamaFileP1 menggunakan query builder
                    $namaFileP1Id = DB::table('nama_file_p1')->insertGetId([
                        'nama_filep1' => $validatedData['nama_filep1'],
                        'id_fp1' => $fileP1Id,  // id_fp1 dari tabel FileP1
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);

                    // Simpan data ke tabel Penetapan menggunakan query builder
                    DB::table('penetapans')->insert([
                        'submenu_penetapan' => $validatedData['submenu_penetapan'],
                        'id_fp1' => $fileP1Id,  // id_fp1 dari FileP1
                        'id_nfp1' => $namaFileP1Id,  // id_nfp1 dari NamaFileP1
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            } else {
                // Jika tidak ada file, tetap simpan dengan field file kosong
                $fileP1Id = DB::table('file_p1')->insertGetId([
                    'files' => '', // field file diset kosong
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                // Simpan data ke tabel NamaFileP1 menggunakan query builder
                $namaFileP1Id = DB::table('nama_file_p1')->insertGetId([
                    'nama_filep1' => $validatedData['nama_filep1'],
                    'id_fp1' => $fileP1Id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                // Simpan data ke tabel Penetapan menggunakan query builder
                DB::table('penetapans')->insert([
                    'submenu_penetapan' => $validatedData['submenu_penetapan'],
                    'id_fp1' => $fileP1Id,
                    'id_nfp1' => $namaFileP1Id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // Tampilkan pesan sukses
            Alert::success('success', 'Dokumen berhasil ditambahkan.');
            return redirect()->route('penetapan.perangkat');
        } catch (\Exception $e) {
            // Menangkap semua error dan menampilkan pesan kesalahan
            Alert::error('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }



    public function lihatdokumenperangkat($id_penetapan)
    {
        $dokumenp1 = Penetapan::with('fileP1')->findOrFail($id_penetapan);
        $filePaths = json_decode($dokumenp1->files, true);

        if (is_array($filePaths) && !empty($filePaths)) {
            $file = $filePaths[0];

            if (Storage::disk('local')->exists($file)) {
                return response()->file(storage_path('app' . $file));
            } else {
                abort(404, 'File not found.');
            }
        }
    }

    public function edit(String $id_penetapan)
    {
        $data = DB::table('penetapans')
        ->select(
            'penetapans.id_penetapan',
            'penetapans.submenu_penetapan',
            'penetapans.id_nfp1',
            'penetapans.id_fp1',
            'nama_file_p1.nama_filep1',  // Ambil nama_filep1 dari tabel nama_file_p1
            'file_p1.files'  // Ambil files dari tabel file_p1
        )
        ->join('nama_file_p1', 'penetapans.id_nfp1', '=', 'nama_file_p1.id_nfp1')  // Join ke nama_file_p1 berdasarkan id_nfp1
        ->join('file_p1', 'penetapans.id_fp1', '=', 'file_p1.id_fp1')  // Join ke file_p1 berdasarkan id_fp1
        ->where('penetapans.id_penetapan', '=', $id_penetapan)  // Kondisi untuk mencari berdasarkan id_penetapan
        ->first();  // Mengambil data pertama (objek tunggal)

        return view('User.admin.Penetapan.edit_perangkatspmi', ['oldData' => $data]);
    }

    public function update(Request $request, $id_penetapan)
    {
        try {
            // Validasi input
            $validatedData = $request->validate([
                'submenu_penetapan' => 'required',
                'nama_filep1' => 'required|string',
                'files.*' => 'nullable|mimes:doc,docx,xls,xlsx,pdf|max:2048',
            ]);

            $penetapan = DB::table('penetapans')->where('id_penetapan', $id_penetapan)->first();

            if (!$penetapan) {
                // Jika penetapan tidak ditemukan
                Alert::error('error', 'Penetapan tidak ditemukan.');
                return redirect()->back();
            }

            $fileP1 = DB::table('file_p1')->where('id_fp1', $penetapan->id_fp1)->first();
            $namaDokumen = $fileP1->files; // Ambil nama file yang ada di database

            // Jika ada file yang diupload, lakukan penyimpanan
            if ($request->hasFile('files')) {
                $uploadedFiles = [];

                // Hapus file lama jika ada
                if ($namaDokumen) {
                    $oldFiles = explode(',', $namaDokumen);
                    foreach ($oldFiles as $oldFile) {
                        Storage::disk('public')->delete('perangkatspmi/' . $oldFile);
                    }
                }

                // Upload file baru
                foreach ($request->file('files') as $file) {
                    $namaFile = time() . '-' . $file->getClientOriginalName();
                    $file->storeAs('standar', $namaFile, 'public');
                    $uploadedFiles[] = $namaFile;
                }

                $namaDokumen = implode(',', $uploadedFiles);  // Gabungkan nama file baru menjadi string
            }

            // Update tabel FileP1
            DB::table('file_p1')->where('id_fp1', $penetapan->id_fp1)->update([
                'files' => $namaDokumen,
                'updated_at' => now(),
            ]);

            // Update tabel NamaFileP1
            DB::table('nama_file_p1')->where('id_nfp1', $penetapan->id_nfp1)->update([
                'nama_filep1' => $validatedData['nama_filep1'],
                'updated_at' => now(),
            ]);

            // Update tabel Penetapan
            DB::table('penetapans')->where('id_penetapan', $id_penetapan)->update([
                'submenu_penetapan' => $validatedData['submenu_penetapan'],
                'updated_at' => now(),
            ]);

            // Tampilkan pesan sukses
            Alert::success('success', 'Dokumen berhasil diperbarui.');
            return redirect()->route('penetapan.perangkat');
        } catch (\Exception $e) {
            // Menangkap semua error dan menampilkan pesan kesalahan
            Alert::error('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id_penetapan)
    {
        $dokumenp1 = Penetapan::findOrFail($id_penetapan);
        $files = json_decode($dokumenp1->files, true);
        if (is_array($files)) {
            foreach ($files as $file) {
                Storage::disk('local')->delete($file);
            }
        }
        $dokumenp1->delete();

        Alert::success('success', 'Dokumen berhasil dihapus.');
        return redirect()->route('penetapan.perangkat');
    }
}
