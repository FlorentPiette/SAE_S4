<?php
class Conn {
        private static $conn = null;

        public static function getInstance() : PDO {
            if (self::$conn == null) {
                self::$conn = self::get_pdo_con();
            }
            return self::$conn;
        }

        private static function get_pdo_con() : PDO {
            $chemin = $_SERVER['DOCUMENT_ROOT']."/Model/logs.json";
            $f = fopen($chemin, "r");
            $cont = fread($f, filesize($chemin));
            $cont = json_decode($cont, true);
            fclose($f);
            $hote = $cont["hote"];
            $port = $cont["port"];
            $nomdb = $cont["nomdb"];
            $user = $cont["user"];
            $mdp = $cont["mdp"];
            $conn = new PDO("pgsql:host=$hote;port=$port;dbname=$nomdb;user=$user;password=$mdp");
            return $conn;  
        }
    }
?>
