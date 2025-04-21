<?php
defined('ACCESO_PERMITIDO') or define('ACCESO_PERMITIDO', true);

class Conexion {
    private static $instancia = null;

    private function __construct() {} // Constructor privado para singleton

    public static function conectar() {
        if (self::$instancia === null) {
            $config = [
                'host' => 'localhost',
                'usuario' => 'root',
                'password' => '',
                'basedatos' => 'sistemaventas',
                'charset' => 'utf8mb4'
            ];

            try {
                self::$instancia = new mysqli(
                    $config['host'],
                    $config['usuario'],
                    $config['password'],
                    $config['basedatos']
                );

                if (self::$instancia->connect_error) {
                    throw new Exception("Error de conexión: " . self::$instancia->connect_error);
                }

                self::$instancia->set_charset($config['charset']);
            } catch (Exception $e) {
                error_log($e->getMessage());
                die("Error al conectar con la base de datos");
            }
        }
        return self::$instancia;
    }

    public static function desconectar() {
        if (self::$instancia !== null) {
            self::$instancia->close();
            self::$instancia = null;
        }
    }
}
?>
