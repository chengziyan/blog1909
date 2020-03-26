<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $table = 'books';
    protected $primaryKey = 'books_id';
    public $timestamps = false;

    //黑名单
    protected $guarded = [];
}