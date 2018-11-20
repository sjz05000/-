<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
    //表格名称
    public $table = 'dy-navigation';
    /**
	 * 获取类别下的文章
	 */
	public function Article()
	{
	    return $this->hasMany('App\Model\Article','navigation_id');
	}
}

