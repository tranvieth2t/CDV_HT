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
            $date = date('Y_m_d_');
            $name = $date.$dataImages['community'].$imageNew->getClientOriginalName();
            $folder = $dataImages['folder'] ?? 'images';
            $pathFile = $folder . '/' . $name;
            Storage::disk($this->disk)->putFileAs($folder, $imageNew,$name);
            return $pathFile;
    }

    public function storeBase64ImageToS3($img, $community = '', $folder)
    {
        try {
            list($baseType, $image) = explode(';', $img);
            list(, $image) = explode(',', $image);
            list(, $typeImage) = explode('/', $baseType);
            $image = base64_decode($image);
            $date = date('Y_m_d_');
            $imageName = $date . $community . '_'.\Str::uuid(). '.' . $typeImage;
            $filePath = $folder . $imageName;
            Storage::disk($this->disk)->put($filePath, $image);
            return config('filesystems.disks.s3.url') . $filePath;
        } catch (Exception $exception) {
            $this->writeExceptionLog('Upload s3', $exception);
            return false;
        }
    }

    public function isDestroy($path): bool
    {
        $imagePath = parse_url($path)['path'];
        return Storage::disk($this->disk)->delete($imagePath);
    }

    public function resizeImage($image, $fileName, $resize)
    {
        $width = $resize[0];
        $height = $resize[1] ?? $resize[0];
        $imageResize = Image::make($image)->resize($width, $height);
        Storage::disk($this->disk)->put($fileName, $imageResize->stream());
    }
}
