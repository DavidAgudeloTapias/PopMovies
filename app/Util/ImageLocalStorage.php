<?php

namespace App\Util;
use App\Models\Movie;

use Illuminate\Http\Request;

class ImageLocalStorage
{
    public function storeAndGetPath(Request $request, string $folder, int $movieId): ?string
    {
        if ($request->hasFile('poster')) {
            $filename = $movieId.'.'.$request->file('poster')->extension();
            $imagePath = 'img/'.$folder.'/'.$filename;
            $request->file('poster')->move(public_path('img/'.$folder), $filename);
            return $imagePath;
        }
        return null;
    }
}
