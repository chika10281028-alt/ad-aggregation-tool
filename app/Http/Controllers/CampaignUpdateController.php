<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use app\Models\Addatas;
use app\Models\Campaigns;

class CampaignUpdateController extends Controller
{
    public function getCampaign($id)
    {
        $campaign = Campaigns::where('id', $id)->first();
        return view('campaign_update')->with('campaign', $campaign);
    }

    public function updateCampaign(Request $request)
    {

        $name =  $request->input('name');
        $activeFlg =  $request->input('activeFlg');

        $campaign = Campaigns::find($request->id);
        $campaign->update([
            "name" => $name,
            "activeFlg" => $activeFlg,
        ]);

        return redirect('/campaign_updateComplete');
    }
}
