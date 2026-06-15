<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use app\Models\Addatas;
use app\Models\Medias;

class AdAggregationController extends Controller
{
  public function getAddatas(Request $request)
  {
    $startDate = $request->input('startDate');
    $endDate = $request->input('endDate');
    $media = $request->input('media');
    $keyword = $request->input('keyword');

    $query = Addatas::join('medias', 'addatas.mediasId', '=', 'medias.id')
      ->join('campaigns', 'addatas.campaignsId', '=', 'campaigns.id');

    $query->where('medias.activeFlg', '1');
    $query->where('campaigns.activeFlg', '1');

    // 開始日時、終了日時が空でない場合、検索条件に含める
    if (!empty($startDate)) {
      $query->whereDate('addatas.createdDate', '>=', $startDate);
    }

    if (!empty($endDate)) {
      $query->whereDate('addatas.createdDate', '<=', $endDate);
    }

    //$mediaが空ではない場合、検索処理に含める
    if (!empty($media)) {
      $query->where('addatas.mediasId', '=', $media);
    }

    //$keywordが空ではない場合、検索処理に含める
    if (!empty($keyword)) {
      $query->where('campaigns.name', 'LIKE', "%{$keyword}%");
    }
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

    $medias = Medias::get();

    return view('adaggregation', compact('addatas', 'medias'));
  }
}
