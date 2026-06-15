<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use app\Models\Addatas;
use app\Models\Medias;

class MediaUpdateController extends Controller
{
    public function getMedia($id)
    {
        $media = Medias::where('id', $id)->first();
        return view('media_update')->with('media', $media);
    }

    public function updateMedia(Request $request)
    {

        $name =  $request->input('name');
        $activeFlg =  $request->input('activeFlg');

        $media = Medias::find($request->id);
        $media->update([
            "name" => $name,
            "activeFlg" => $activeFlg,
        ]);

        return redirect('/media_updateComplete');
    }
}
