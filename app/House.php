<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $table = 'house';
    protected $primaryKey = 'b_id';
    public $timestamps = false;

    //黑名单
    protected $guarded = [];
}
