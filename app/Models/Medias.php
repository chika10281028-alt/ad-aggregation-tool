<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Medias extends Model
{
    use Sortable;
    public $timestamps = false;
    protected $fillable = ['name', 'activeFlg'];
}
