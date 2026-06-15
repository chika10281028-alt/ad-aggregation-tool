<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use app\Models\Addatas;
use app\Models\Campaigns;
use app\Models\Medias;

class AddataUpdateController extends Controller
{
    public function getAddata($id)
    {
        $addata = Addatas::where('id', $id)->first();

        $medias = Medias::where('activeFlg', '1')->get();

        $campaigns = Campaigns::where('activeFlg', '1')->get();

        return view('addata_update', compact('addata', 'medias', 'campaigns'));
    }

    public function updateAddata(Request $request)
    {

        $campaignId =  $request->input('campaignId');
        $mediaId =  $request->input('mediaId');
        $activeFlg =  $request->input('activeFlg');

        $addata = Addatas::find($request->id);
        $addata->update([
            "campaignsId" => $campaignId,
            "mediasId" => $mediaId,
            "activeFlg" => $activeFlg,
        ]);

        return redirect('/addata_updateComplete');
    }
}
