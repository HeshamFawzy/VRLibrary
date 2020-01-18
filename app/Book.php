<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $fillable = ['title','author','publisher','publishing_date','category','edition','pages','no_of_copies', 'no_of_borrowed' ,'available' , 'shelf_Number'];
}
