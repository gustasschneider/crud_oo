<?php

class MySQL{

    public static function conexao(){

        $host = getenv("MYSQL_HOST");
        $user = getenv("MYSQL_USER");
        $senha = getenv("MYSQL_PASSWORD");
        $db = getenv("MYSQL_DB");

        return new PDO("mysql:dbname=$db;host=$host", "$user", "$senha");
    }

}