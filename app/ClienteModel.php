<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClienteModel extends Model
{
    protected $table = 'cliente';
    protected $fillable = ['name', 'dob', 'phone', 'email', 'address', 'payments', 'total'];
}
