<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagenesDePortada extends Model
{
    protected $table = 'imagenesDePortada';
    protected $primaryKey = 'id';
    
    protected $fillable = ['id', 'titulo', 'imagen', 'tipo', 'descripcion'];
    
    public $timestamps  = true;

    
    public function imagenesDePortada(){
        return $this->belongsTo(imagenesDePortada::class);
    }

    public static function get_registro($id)
    {
        $row = self::find($id);
        return $row;       
    }
}