<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    // 是指当前表名
    public $table = 'dy-feedback';

    // 反馈属于用户
    public function feedbackuser()
    {
        return $this->belongsTo('App\User','uid');
    }
}
