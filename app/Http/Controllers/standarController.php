<?php

namespace App\Http\Controllers;

use App\Models\Penetapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use function PHPUnit\Framework\isNull;

use function PHPUnit\Framework\isEmpty;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class standarController extends Controller
{
    public function index()
    {
        $standar = DB::table('penetapans')
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
        ->where('submenu_penetapan', 'standarinstitusi')
        ->get();
        // foreach ($standar as $s) {
        //     $files = unserialize($s->files);
        // }
        return view('User.admin.Penetapan.standarinstitusi', compact(['standar'])); //compact(['standar', 'files'])
    }

    public function folder($id)
    {
        $standar = Penetapan::with('fileP1', 'namaFileP1')
        ->join('file_p1', 'penetapans.id_nfp1', '=', 'file_p1.id_fp1')
        ->join('nama_file_p1', 'nama_file_p1.id_fp1', '=', 'file_p1.id_fp1')
        ->select('penetapans.id_penetapan', 'penetapans.submenu_penetapan', 'nama_file_p1.nama_filep1', 'file_p1.files')
        ->where('id_penetapan', $id)
        ->first();
        $files = unserialize($standar->files);
        return view('User.admin.Penetapan.folder_dokumen.dokumen_standarpendidikan', compact('standar', 'files'));
    }

    public function create($id)  //tombol Unggah | $id: mengambil data id di row tabel standarinstitusi.blade // first: mengambil satu data dari satu row
    {
        $penetapan = DB::table('penetapans')
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
        ->where('id_penetapan', $id)
        ->first();
        $namaDokumen = $penetapan->nama_filep1;
        return view('User.admin.Penetapan.folder_dokumen.tambahdokumen_standarinstitusi')->with(['id' => $id, 'nama' => $namaDokumen]);
    }

    public function uploadDokumen(Request $request)
    {
        try {
            // Validasi input
            $validatedData = $request->validate([
                'id_penetapan' => 'required',
                'files.*' => 'nullable|mimes:doc,docx,xls,xlsx,pdf|max:2048',
            ]);

            // Dapatkan id_penetapan dari request
            $idPenetapan = $validatedData['id_penetapan'];

            // Cek apakah ada file baru yang diunggah
            if ($request->hasFile('files')) {
                $namaDokumen = [];
                foreach ($request->file('files') as $file) {
                    $namaFile = time() . '-' . $file->getClientOriginalName();
                    $file->storeAs('standar', $namaFile, 'public');
                    $namaDokumen[] = $namaFile;  // Simpan nama file di array
                }

                // Gabungkan nama file menjadi string
                if (!empty($namaDokumen)) {
                    $namaDokumen = implode(',', $namaDokumen);
                }

                // Update hanya kolom files di tabel FileP1 yang terkait dengan penetapan
                DB::table('file_p1')
                    ->join('penetapans', 'file_p1.id_fp1', '=', 'penetapans.id_fp1')
                    ->where('penetapans.id_penetapan', $idPenetapan)
                    ->update([
                        'file_p1.files' => $namaDokumen,
                        'file_p1.updated_at' => now(),
                    ]);

                // Tampilkan pesan sukses
                Alert::success('success', 'Dokumen berhasil diperbarui.');
                return redirect()->route('penetapan.standar');
            }

            // Jika tidak ada file yang diunggah, tetap kembalikan response
            Alert::info('info', 'Tidak ada file yang diunggah.');
            return redirect()->back();
        } catch (\Exception $e) {
            // Menangkap semua error dan menampilkan pesan kesalahan
            Alert::error('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }


    public function standar_create() //tambah standar
    {
        return view('User.admin.Penetapan.tambah_standarspmi');
    }

    public function store(Request $request)
    {
        try {
            // Validasi input
            $validatedData = $request->validate([
                'submenu_penetapan' => 'required',
                'nama_filep1' => 'required|string',
                'files.*' => 'nullable|mimes:doc,docx,xls,xlsx,pdf|max:2048',
            ]);

            $namaDokumen = [];
            if ($request->hasFile('files')) {
                foreach ($request->file('files') as $file) {
                    $namaFile = time() . '-' . $file->getClientOriginalName();
                    $file->storeAs('standar', $namaFile, 'public');
                    $namaDokumen[] = $namaFile;  // Simpan nama file di array
                }
                // Pastikan $namaDokumen adalah array dan tidak null
                if (!empty($namaDokumen)) {
                    $namaDokumen = implode(',', $namaDokumen);  // Gabungkan nama file menjadi string
                }
            }


            // Simpan data file ke tabel FileP1 menggunakan query builder
            $fileP1Id = DB::table('file_p1')->insertGetId([
                'files' => is_array($namaDokumen) ? implode(',', $namaDokumen) : $namaDokumen, // Pastikan namaDokumen sudah dalam bentuk string
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

            // Tampilkan pesan sukses
            Alert::success('success', 'Dokumen berhasil ditambahkan.');
            return redirect()->route('penetapan.standar');
        } catch (\Exception $e) {
            // Menangkap semua error dan menampilkan pesan kesalahan
            Alert::error('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }


    public function lihatdokumenstandar($id_penetapan)
    {
        $standar = Penetapan::findOrFail($id_penetapan);
        $filePaths = json_decode($standar->files, true); //string berkode JSON (berupa path file) diterjemahkan ke bentuk array

        if (is_array($filePaths) && !empty($filePaths)) { //memeriksa variabel $filePaths apakah berupa array, dan tidak kosong?
            $file = $filePaths[0];

            if (Storage::disk('local')->exists($file)) {
                return response()->file(storage_path('app' . $file)); //mengarahkan ke file
            } else {
                abort(404, 'File not found.');
            }
        }
    }

    public function edit($id)
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
        ->where('penetapans.id_penetapan', '=', $id)  // Kondisi untuk mencari berdasarkan id_penetapan
        ->first();  // Mengambil data pertama (objek tunggal)

        return view('User.admin.Penetapan.edit_standarinstitusi', ['oldData' => $data]);
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
                        Storage::disk('public')->delete('standar/' . $oldFile);
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
            return redirect()->route('penetapan.standar');
        } catch (\Exception $e) {
            // Menangkap semua error dan menampilkan pesan kesalahan
            Alert::error('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }


    public function destroy($id_penetapan)
    {
        $standar = Penetapan::findOrFail($id_penetapan);
        $files = json_decode($standar->files, true);
        if (is_array($files)) {
            foreach ($files as $file) {
                Storage::disk('local')->delete($file);
            }
        }
        $standar->delete();

        Alert::success('success', 'Dokumen berhasil dihapus.');
        return redirect()->route('penetapan.standar');
    }
}
