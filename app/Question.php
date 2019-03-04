<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['title','subtitle','multiple'];
    public function choices(){
        return $this->hasMany(Choice::class);
    }
}
