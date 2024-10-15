<?php

namespace App\Service;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Repositories\DocumentRepository;

class DocumentServiceimplement
{
    protected $mainRepository;

    public function _construct(DocumentRepository $mainRepository)
    {
        $this->mainRepository = $mainRepository;
    }

    public function create($data)
    {
        $file_path = 'docs';
        if (!File::exists($file_path)) {
            File::makeDirectory($file_path, 0775, true, true);
        }

        if ($data['file']) {
            $file = $data['file'];
            $ext = $file->getClientOriginalExtension();
            $fileName = rand(100000, 1001238912) . '.' . $ext;
            Storage::disk('local')->put('/private/' . $fileName, File::get($file));
            $data['file'] = $fileName;
        }

        $this->mainRepository->create($data);
    }
}
