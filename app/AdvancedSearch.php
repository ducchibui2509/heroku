<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvancedSearch extends Model
{
    //
    protected $table = 'advancedsearch';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable=['term','category','status','time'];
}
