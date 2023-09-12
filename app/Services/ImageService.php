<?php

namespace App\Services;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;

class ImageService
{
    public static function saveImage($imageFile)
    {
        $filenameWithExt = $imageFile->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $imageFile->getClientOriginalExtension();
        $fileNameToStore = $filename . '_' . time() . '.' . $extension;
        $imageFile->storeAs('public/images', $fileNameToStore);
        return $fileNameToStore;
    }

    public static function saveImages($imageFiles)
    {
        if (is_array($imageFiles)) {
            foreach ($imageFiles as $imageFile) {
                $fileNameToStore = self::saveImage($imageFile);
                Image::create([
                    'owner_id' => Auth::id(),
                    'filename' => $fileNameToStore,
                ]);
            }
        }
        return redirect()
            ->route('owner.images.index')
            ->with(['message' => '画像を登録しました。', 'status' => 'info']);
    }
}
