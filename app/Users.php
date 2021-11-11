<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
        //
        protected $fillable = [
            'nombreyApellido', 'email', 'telefono','dni', 'contrasena', 'fecha_nacimiento', 'obra_social', 'nro_afiliado','admin',
        ];
    
        /**
         * The attributes that should be hidden for arrays.
         *
         * @var array
         */
        protected $hidden = [
            'contrasena', 'remember_token',
        ];

        public static function get_registro($email)
        {
            $row = Users::where('email', '=', $email)->first();

            return $row;       
        }
        public static function get_registroID($id)
        {
            $row = Users::where('id', '=', $id)->first();

            return $row;       
        }
}
