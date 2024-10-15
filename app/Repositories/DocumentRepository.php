<?php

namespace App\Repositories;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DocumentRepository
{
    /**
     * Membuat folder jika belum ada, dan menambahkan file ke dalam folder tersebut.
     *
     * @param  array  $data
     * @return string
     */
    public function uploadFile($data)
    {
        // Path ke direktori tempat menyimpan file
        $file_path = 'docs';

        // Cek apakah folder ada, jika tidak, buat folder tersebut
        if (!File::exists($file_path)) {
            File::makeDirectory($file_path, 0775, true, true);
        }

        // Cek apakah ada file yang diunggah
        if (isset($data['file'])) {
            $file = $data['file'];

            // Ambil ekstensi file
            $ext = $file->getClientOriginalExtension();

            // Membuat nama file yang unik
            $fileName = rand(100000, 1001238912) . '.' . $ext;

            // Simpan file ke dalam direktori 'private' dengan Storage
            Storage::disk('local')->put('/private/' . $fileName, File::get($file));

            // Kembalikan nama file yang sudah disimpan
            return $fileName;
        }

        // Jika tidak ada file yang diunggah, kembalikan nilai null
        return null;
    }
}
