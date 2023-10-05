<?php

function conn($host, $dbname,$username,$password){
    $dsn = "pgsql:host=$host;port=5432;dbname=$dbname;user=$username;password=$password";

    try {
        return new PDO($dsn);
    } catch (PDOException $e) {
        return "Erreur : " . $e->getMessage();
    }
}

?>