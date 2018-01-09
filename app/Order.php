<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['status', 'price', 'size', 'layout', 'colour', 'noCopies' ,'user_id', 'filename', 'mime', 'original_filename'];
}
