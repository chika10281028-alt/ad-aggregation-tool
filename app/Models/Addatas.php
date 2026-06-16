<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Addatas extends Model
{
    use Sortable;
    public $timestamps = false;

    public $sortable = ['id', 'impression', 'click', 'cost', 'cv', 'createdDate', 'activeFlg'];
    public $sortableAs = ['campaignName', 'mediaName'];

    protected $fillable = ['mediasId', 'campaignsId', 'activeFlg'];

    public function campaigns()
    {
        // Campaignsモデルのデータをリレーションする
        return $this->hasOne('App\Models\Campaigns')->sortable()->get();
    }

    public function medias()
    {
        // Mediasモデルのデータをリレーションする
        return $this->hasOne('App\Models\Medias')->sortable()->get();
    }
}
