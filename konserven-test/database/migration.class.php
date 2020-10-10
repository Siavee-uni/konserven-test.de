<?php
include_once 'database.class.php';
class Migration extends Database {

   public function __construct() {

        $createTableCon = "CREATE TABLE IF NOT EXISTS `konserven` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `name` varchar(256) NOT NULL,
        `description` text NOT NULL,
        `bio` BOOLEAN,
        `vegan` BOOLEAN,
        `image` text NOT NULL,
        `score` int NOT NULL,
        `filling` int NOT NULL,

        `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=19" ;
    
        $createTableUser = "CREATE TABLE IF NOT EXISTS `User` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `name` varchar(256) NOT NULL,
        `passwort` varchar(256) NOT NULL,
        `created` datetime NOT NULL,
        `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=19" ;
        
        $connection = new Database;
        $connection->conn->exec($createTableCon);
        $connection->conn->exec($createTableUser);
        }
}
