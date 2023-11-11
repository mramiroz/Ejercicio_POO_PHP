<?php
    class Sesion{
        public static function crearSesion(){
            session_start();
        }
        public static function anadirSesion($obj, $get){
            $_SESSION[$get] = serialize($obj);
        }

        public static function obtenerSesion($get){
            return unserialize($_SESSION[$get]);
        }
    }
?>