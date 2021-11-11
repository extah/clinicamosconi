<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comprobante extends Model
{
    //metodos
    public static function get_registro($id)
    {
        $row = self::find($id);
        return $row;       
    }
}
