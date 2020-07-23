<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Article extends Model
{
    protected $fillable = ['title', 'body'];  //

    public function comments() {
        return $this->belongsTo('App\User');
    }
    public function user() {
        return $this->belongsTo('App\User');
    }
    public static function boot() {     parent::boot();

        static::creating(function ($article) {
            $article->user_id = Auth::id();     });
    }
}
