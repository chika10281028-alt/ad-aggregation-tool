<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use app\Models\Addatas;
use app\Models\Campaigns;

class CampaignRegisterController extends Controller
{
    public function getCampaigns()
    {
        $campaigns = Campaigns::sortable()->get();
        return view('campaign_register')->with('campaigns', $campaigns);
    }

    public function insertCampaign(Request $request)
    {

        $id =  $request->input('id');
        $name =  $request->input('name');
        $activeFlg =  $request->input('activeFlg');

        $campaign = new Campaigns;

        $isExists = Campaigns::where('id', $request->id)->exists();
        if ($isExists) {
            return redirect('/campaign_register')->withErrors([
                'id' => 'IDが重複しています。',
            ]);
        }

        $campaign->id = $id;
        $campaign->name = $name;
        $campaign->activeFlg = $activeFlg;
        $campaign->save();

        return redirect('/campaign_register');
    }
}
