<?php

namespace App\Models;
    
use Illuminate\Database\Eloquent\Model;
    
class Title extends Model{
    protected $table = "title";

    protected $fillable = ["title","prov","city","images","phone","email","maps","facebook","fee"];

    // public $timestamps = false;
    // protected $hashable = ['password'];

    protected $filterable = ["title","prov","city","images","phone","email","maps","facebook","fee"];

    /**
     * Create by LeeNuksID :D
     * Thanks For Using Laragen
     */
}