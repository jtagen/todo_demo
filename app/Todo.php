<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{

    protected $fillable = ['item', 'user_id', 'is_deleted','is_complete'];



}
