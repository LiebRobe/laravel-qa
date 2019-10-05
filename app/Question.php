<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Str;

class Question extends Model
{
    protected $fillable=[
        'title','body','slug'
    ];

        public function user()
        {
            return $this->belongsTo(User::class);
        }
        public function setTitleAttribute($value)
        {
            $this->attributes['title']=$value;
            $this->attributes['slug']= Str::slug($value);
        }
}
