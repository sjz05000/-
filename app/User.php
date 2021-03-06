<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    // protected $table = 'users';
    protected $table = 'dy-users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    // 配置用户和用户详情关系
    // 一对一
    public function userinfo()
    {
        return $this->hasOne('App\Model\Userdetail','uid');
    }
    // 配置用户和文章的多对多关系  收藏
    // 多对多
    public function usercollect()
    {
        return $this->belongsToMany('App\Model\Article','dy-collect','uid','tid');
    }
    // // 配置用户和文章的一对多关系  发布
     //一对多
    public function usera()
    {
        return $this->hasMany('App\Model\Article','uid');
    }


}
