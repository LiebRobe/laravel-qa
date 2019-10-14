<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Question;

class Answer extends Model
{
    protected $fillable=[
        'body','user_id'
    ];
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getBodyHtmlAttribute()
    {
        return \Parsedown::instance()->text($this->body);
    }

    public static function boot()
    {
        parent::boot();

        static::created( function ($answer){
            $answer->question->increment('answers_count');
            // $answer->question->save();       //you don`t need to call this save() method, it`s called behind
                                                //the schene, when you call increment() method
        });

    }

        public function getCreatedDateAttribute(){
            return $this->created_at->diffForHumans();
        }
}
