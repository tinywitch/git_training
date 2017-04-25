<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
helloworld
class Product extends Model
{
    protected $table ='products';
    protected $fillable =[
    'id',
    'name',
    'alias',
    'price',
    'intro',
    'content',
    'image',
    'keywords',
    'description',
    'user_id',
    'cate_id',
    ];
    public $timestamp = true;

    public function cate()
    {
        return $this->belongTo('App\Cate');
    }

    public function user()
    {
        return $this->belongTo('App\User');
    }

    public function pimage()
    {
        return $this->hasMany('App\Image');
    }
}
