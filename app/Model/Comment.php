<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // 是指当前表名
	protected $table = 'dy-comment';
	// 评论和用户的多对多关系 
    // 多对多
    public function user()
    {
        return $this->belongsToMany('App\User','dy-comment','id','uid');
    } 
}
