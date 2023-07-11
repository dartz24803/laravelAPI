<?php

namespace App;

use Illuminate\Support\Facades\DB;

class Cliente extends Model
{
    protected $table = 'cliente';
    protected $fillable = ['name', 'dob', 'phone', 'email', 'address', 'payments', 'total'];
    
    public static function listarClientes()
    {
        return DB::select('CALL listar_clientes()');
    }
}
