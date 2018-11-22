<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Heatmap extends Model
{
	// 是指当前表名
	protected $table = 'dy-heatmap';
	// 热图管理属于文章
	 //属于
    public function hamap()
    {
        return $this->belongsTo('App\Model\Article','tid');
    }
}
