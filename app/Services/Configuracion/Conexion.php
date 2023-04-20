<?php

namespace App\Services\Configuracion;

use Illuminate\Support\Facades\Config;

use App\Models\Sistemas\SisConexion;

class Conexion {

    public $name_connection;
    
    public function __construct( $name_connection ){
        $this->name_connection = $name_connection;
    }

    public function getConnection(){

        $response = SisConexion::where('NAME_CONNECTION', $this->name_connection)
                                ->first(['NAME_CONNECTION', 'DB_HOST', 'DB_PORT', 'DB_DATABASE', 'DB_USERNAME', 'DB_PASSWORD']);

        $configDb = [
            'driver'    => 'mysql',
            'host'      => $response->DB_HOST,
            'port'      => $response->DB_PORT,
            'database'  => $response->DB_DATABASE,
            'username'  => $response->DB_USERNAME,
            'password'  => $response->DB_PASSWORD
        ];

        $CONFIG = 'database.connections.'.$this->name_connection;
        Config::set($CONFIG,$configDb);

    }

    public function getConnectionTeam($ip){

        $configDb = [
            'driver'    => 'mysql',
            'host'      => $ip,
            'port'      => '3306',
            'database'  => 'recuento',
            'username'  => 'root',
            'password'  => ''
        ];

        $CONFIG = 'database.connections.'.$this->name_connection;
        Config::set($CONFIG, $configDb);
       
    }

}