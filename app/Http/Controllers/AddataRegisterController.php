<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use app\Models\Addatas;
use app\Models\Campaigns;
use app\Models\Medias;
use Carbon\Carbon;

class AddataRegisterController extends Controller
{
    public function getAddatas()
    {
        $query = Addatas::join('medias', 'addatas.mediasId', '=', 'medias.id')
            ->join('campaigns', 'addatas.campaignsId', '=', 'campaigns.id');

        $addatas = $query->select(
            'addatas.id as id',
            'medias.name as mediaName',
            'campaigns.name as campaignName',
            'addatas.impression as impression',
            'addatas.click as click',
            'addatas.cv as cv',
            'addatas.cost as cost',
            'addatas.createdDate as createdDate',
            'addatas.activeFlg as activeFlg'
        )
            ->sortable()->get();

        $medias = Medias::where('activeFlg', '1')->get();

        $campaigns = Campaigns::where('activeFlg', '1')->get();

        return view('addata_register', compact('addatas', 'medias', 'campaigns'));
    }

    public function insertAddata(Request $request)
    {

        $now = Carbon::now();

        $id =  $request->input('id');
        $campaignId =  $request->input('campaignId');
        $mediaId =  $request->input('mediaId');
        $activeFlg =  $request->input('activeFlg');

        $addata = new Addatas;

        $isExists = Addatas::where('id', $request->id)->exists();
        if ($isExists) {
            return redirect()->back()->withInput()->withErrors([
                'id' => 'IDが重複しています。',
            ]);
        }

        $addata->id = $id;
        $addata->campaignsId = $campaignId;
        $addata->mediasId = $mediaId;
        $addata->createdDate = $now;
        $addata->activeFlg = $activeFlg;
        $addata->save();

        return redirect()->back()->withInput();
    }
}
