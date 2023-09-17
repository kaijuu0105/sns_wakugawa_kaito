<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //指定したカラムに対してのみcreate,updateなど可能になる
    protected $fillable = [
        'user_id', 'post'
    ];
    //リレーションの定義
    //「1対多」の「1」側 → メソッド名は単数形でbelongsToを使う
    public function user(){
        return $this->belongsTo('App\User');
    }
}
