<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Image;
use App\Http\Requests\UploadImageRequest;
use Illuminate\Support\Facades\Storage;
use App\Services\ImageService;
use App\Models\Owner;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:owners');
        $this->middleware(function ($request, $next) {
            $id = $request->route()->parameter('image');
            if (!is_null($id)) {
                $imagesOwnerId = Image::findOrFail($id)->owner->id;
                $imageId = (int)$imagesOwnerId;
                $ownerId = Auth::id();
                if ($imageId !== $ownerId) {
                    abort(404);
                }
            }
            return $next($request);
        });
    }
    public function index()
    {
        $images = Image::where('owner_id', Auth::id())->orderBy('updated', 'desc')->paginate(20);
        return view('owner.images.index', compact('images'));
    }
    public function create()
    {
        return view('owner.images.create');
    }
    public function store(UploadImageRequest $request)
    {
        $imageFiles = $request->file('files');
        if (!is_null($imageFiles)) {
            foreach ($imageFiles as $imageFile) {
                $fileNameToStore = ImageService::saveImage($imageFile);
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
