<?php
class Conexion {
    public static function conectar() {
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "sistemaventas";

        $conn = new mysqli($host, $user, $password, $database);

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }
        return $conn;
    }
}
?>