<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use app\Models\Addatas;
use app\Models\Medias;

class MediaRegisterController extends Controller
{
    public function getMedias()
    {
        $medias = Medias::sortable()->get();
        return view('media_register')->with('medias', $medias);
    }

    public function insertMedia(Request $request)
    {

        $id =  $request->input('id');
        $name =  $request->input('name');
        $activeFlg =  $request->input('activeFlg');

        $media = new Medias;

        $isExists = Medias::where('id', $request->id)->exists();
        if ($isExists) {
            return redirect('/media_register')->withErrors([
                'id' => 'IDが重複しています。',
            ]);
        }

        $media->id = $id;
        $media->name = $name;
        $media->activeFlg = $activeFlg;
        $media->save();

        return redirect('/media_register');
    }
}
