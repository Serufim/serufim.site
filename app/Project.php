<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    /*protected $fillable = [
        'name',
        'subtitle',
        'description',
        'demo',
        'created_time',
        'finished_time',
        'current_version',
        'license'
    ];*/
    protected $guarded = [];
    public $timestamps = false;
}
