<?php

namespace App\Services;

use AWS\CRT\Log;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Exception;

class S3Service extends BaseService
{
    protected $disk;

    public function __construct()
    {
        $this->disk = config('app.env') == 'local' ? 'public' : 's3';
    }

    public function uploadImage(array $dataImages) {
            $imageNew = $dataImages['imageNew'] ?? null;
            if (empty($imageNew)) {
                return;
            }
            $name = $imageNew->getClientOriginalName();
            $folder = $dataImages['folder'] ?? 'images';
            $pathFile = $folder . '/' . $name;
            Storage::disk($this->disk)->putFileAs($folder, $imageNew,$name);
            return $pathFile;
    }
}
