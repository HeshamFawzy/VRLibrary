<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    protected $fillable = ['user_id','first_name','last_name','hire_date', 'salary'];
}
