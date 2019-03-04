<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    protected $fillable = ['title','question_id','votes'];
    public function question(){
        return $this->belongsTo(Question::class);
    }
}
