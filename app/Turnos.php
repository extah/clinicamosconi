<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turnos extends Model
{
    
    //metodos
    public static function get_registro($id)
    {
        $row = self::find($id);
        return $row;       
    }
    public static function get_registro_por_comprobante($id_comprobante)
    {
        $row = Turnos::where('id_comprobante', '=', $id_comprobante)->first();

        return $row;       
    }
}
