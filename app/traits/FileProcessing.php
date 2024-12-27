<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

//* Custom Trait for file processing
trait FileProcessing
{
    public function makeDirectory($path)
    {
        if (!Storage::exists($path)) {
            Storage::makeDirectory($path);
        }
    }

    public function downloadFile($url, $path)
    {
        try {
            $response = Http::get($url);
            if ($response->successful()) {
                Storage::disk('public')->put($path, $response->body()); //! using http facade to download file intead of file_get_contents function
                return $path;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            return false;
        }
    }

    public function storeFile($file, $path)
    {
        //* Using \exception to catch all exceptions
        try {
            $storedPath = $file->store($path, 'public');
            return $storedPath;
        } catch (\Exception $e) {
            return false;
        }
    }
}
