<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    public $table='dy-cates';
    // 分类与文章添加一对多关系
    public function Article()
    {
        return $this->hasMany('App\Model\Article','cate_id');
    }
}
