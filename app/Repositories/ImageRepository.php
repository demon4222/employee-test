<?php


namespace App\Repositories;


use App\Models\Image\Image;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageRepository
{
    public static function upload(UploadedFile $file): Image
    {
        $path = Str::random(20) . preg_replace('/^.*\//', '.', $file->getMimeType());
        Storage::disk('public')->put($path, $file->getContent());

        return Image::create([
            'disc' => 'public',
            'path' => $path
        ]);
    }
}
