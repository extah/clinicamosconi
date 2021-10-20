<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especialidades extends Model
{
    //
    protected $table = 'especialidades';
    protected $primaryKey = 'id';
    
    protected $fillable = ['id', 'nombre', 'descripcion', 'fecha_alta'];
    
    public $timestamps  = false;

    //metodos
    public static function get_registro($id)
    {
        $row = self::find($id);
        return $row;       
    }
    
    public function especialidades(){
        return $this->belongsTo(Especialidades::class);
    }

    public function esEspecialidad($id){
        $i = Especialidades::where('id', '=', $id)->first();
        return 10;
    }
}
