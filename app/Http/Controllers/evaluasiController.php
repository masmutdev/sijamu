<?php

namespace App\Http\Controllers;

use App\Models\Evaluasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class evaluasiController extends Controller
{
    public function index()
    {
        // Ambil data gabungan dari tabel nama_file_eval, evaluasi, dan file_eval
        $evaluasi = DB::table('nama_file_eval')
            ->join('evaluasis', 'nama_file_eval.id_evaluasi', '=', 'evaluasis.id_evaluasi')
            ->join('file_eval', 'nama_file_eval.id_nfeval', '=', 'file_eval.id_nfeval')
            ->select(
                'nama_file_eval.nama_fileeval as nama_dokumen',
                'evaluasis.id_evaluasi as id_evaluasi',
                'evaluasis.nama_prodi as program_studi',
                'evaluasis.tanggal_terakhir_dilakukan as tanggal_terakhir_dilakukan',
                'evaluasis.tanggal_diperbarui as tanggal_diperbarui',
                'file_eval.files as unggahan'
            )
            ->get();

        // Kembalikan data ke view
        return view('User.admin.Evaluasi.index_evaluasi', compact('evaluasi'));
    }

    public function create()
    {
        return view('User.admin.Evaluasi.tambah_evaluasi');
    }

    public function store(Request $request)
    {
        try {
            // Validasi input
            $validatedData = $request->validate([
                'namaDokumen_evaluasi' => 'required|string',
                'manual_namaDokumen' => 'nullable|string',
                'program_studi' => 'required|string',
                'tanggal_terakhir_dilakukan' => 'nullable|date',
                'tanggal_diperbarui' => 'nullable|date',
                'unggahan_dokumen.*' => 'nullable|mimes:doc,docx,xls,xlsx,pdf|max:2048',
            ]);

            // Menentukan nama dokumen, apakah dari dropdown atau input manual
            $namaDokumen = $validatedData['namaDokumen_evaluasi'];
            if ($namaDokumen === 'Dokumen Lainnya' && $request->filled('manual_namaDokumen')) {
                $namaDokumen = $request->input('manual_namaDokumen');
            }

            // Simpan data ke tabel evaluasi menggunakan query builder
            $idEvaluasi = DB::table('evaluasis')->insertGetId([
                'nama_prodi' => $validatedData['program_studi'],
                'tanggal_terakhir_dilakukan' => $validatedData['tanggal_terakhir_dilakukan'],
                'tanggal_diperbarui' => $validatedData['tanggal_diperbarui'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Simpan nama dokumen ke tabel nama_file_eval dengan id dari evaluasi
            $idNfeval = DB::table('nama_file_eval')->insertGetId([
                'nama_fileeval' => $namaDokumen,  // Nama dokumen yang disimpan
                'id_evaluasi' => $idEvaluasi,     // Mengambil id_evaluasi dari tabel evaluasi
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Mengupload file dan simpan ke tabel file_eval
            if ($request->hasFile('unggahan_dokumen')) {
                foreach ($request->file('unggahan_dokumen') as $file) {
                    // Simpan file
                    $namaFile = time() . '-' . $file->getClientOriginalName();
                    $file->storeAs('evaluasi', $namaFile, 'public');

                    // Simpan nama file ke tabel file_eval
                    DB::table('file_eval')->insert([
                        'files' => $namaFile,       // Nama file yang diunggah
                        'id_nfeval' => $idNfeval,   // ID dari nama_file_eval
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }

            // Tampilkan pesan sukses
            Alert::success('success', 'Data evaluasi dan dokumen berhasil ditambahkan.');
            return redirect()->route('evaluasi');  // Ubah dengan route yang sesuai

        } catch (\Exception $e) {
            // Menangkap semua error dan menampilkan pesan kesalahan
            Alert::error('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function lihatdokumenevaluasi($id_evaluasi)
    {
        $evaluasi = Evaluasi::findOrFail($id_evaluasi);
        $filePaths = json_decode($evaluasi->unggahan_dokumen, true);

        if (is_array($filePaths) && !empty($filePaths)) {
            $file = $filePaths[0];

            if (Storage::disk('local')->exists($file)) {
                return response()->file(storage_path('app' . $file));
            } else {
                abort(404, 'File not found.');
            }
        }
    }

    public function edit(String $id_evaluasi)
    {
        $dataEvaluasi = Evaluasi::where('id_evaluasi', $id_evaluasi)->first();
        return view('User.admin.Evaluasi.edit_evaluasi', [
            'oldData' => $dataEvaluasi
        ]);
    }

    public function update(Request $request, String $id_evaluasi)
    {
        $dataUpdate = Evaluasi::findOrFail($id_evaluasi);

        // $request->validate([
        //     'namaDokumen_evaluasi' => 'required|string',
        //     'program_studi' => 'required|string',
        //     'tanggal_terakhir_dilakukan' => 'required|date',
        //     'tanggal_diperbarui' => 'required|date',
        //     'unggahan_dokumen[].*' => 'required|mimes:doc,docx,xls,xlsx|max:2048'
        // ]);

        $dataUpdate->namaDokumen_evaluasi = $request->input('namaDokumen_evaluasi');
        $dataUpdate->program_studi = $request->input('program_studi');
        $dataUpdate->tanggal_terakhir_dilakukan = $request->input('tanggal_terakhir_dilakukan');
        $dataUpdate->tanggal_diperbarui = $request->input('tanggal_diperbarui');

        // Proses file baru jika ada
        if ($request->hasFile('unggahan_dokumen')) {
            // Hapus file lama dari storage
            $oldFiles = json_decode($dataUpdate->unggahan_dokumen, true);
            if (is_array($oldFiles)) {
                foreach ($oldFiles as $oldFile) {
                    if (Storage::disk('local')->exists($oldFile)) {
                        Storage::disk('local')->delete($oldFile);
                    }
                }
            }
            $filePaths = [];
            foreach ($request->file('unggahan_dokumen') as $file) {
                $namaDokumen = time() . '-' . $file->getClientOriginalName();
                Storage::disk('local')->put('/evaluasi(AMI)/' . $namaDokumen, File::get($file));
                $filePaths[] = '/evaluasi(AMI)/' . $namaDokumen;
            }
            $dataUpdate->unggahan_dokumen = json_encode($filePaths);
        }
        $dataUpdate->save();

        Alert::success('success', 'Dokumen berhasil diperbarui.');
        return redirect()->route('evaluasi');
    }

    public function destroy(String $id_evaluasi)
    {
        $dataDelete = Evaluasi::findOrfail($id_evaluasi);
        $dataDelete->delete();

        Alert::success('success', 'Dokuumen berhasil dihapus.');
        return redirect()->route('evaluasi');
    }
}
