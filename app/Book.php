<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $fillable = ['title','auther','publisher','publishing_date','category','edition','pages','no_of_copies','avilable','shelf_Number'];
}
