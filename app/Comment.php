<?php

namespace App;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Comment extends Model
{
    protected $fillable = ['text'];
    public function user() {
        return $this->belongsTo('App\User');
    }
    public function article() {
        return $this->belongsTo('App\Article');
    }
    public static function boot() {     parent::boot();

        static::creating(function ($article) {
            $article->user_id = Auth::id();     });
    }
}
