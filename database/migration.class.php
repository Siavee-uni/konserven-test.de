<?php
include_once 'database.class.php';
class Migration extends Database
{

        public function migrate()
        {

        $createTableCon = "CREATE TABLE IF NOT EXISTS `konserven` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `name` varchar(256) NOT NULL,
        `brand` varchar(256) NOT NULL,
        `description` text NOT NULL,
        `bio` BOOLEAN  DEFAULT false,
        `vegan` BOOLEAN  DEFAULT false,
        `image` text NOT NULL,
        `score` int NOT NULL,
        `filling` int NOT NULL,

        `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=19";

        $this->conn->exec($createTableCon);
                
        }
        public function addColumn() {

        $createTableCon = "
        ALTER TABLE `konserven`
        ADD `brand` varchar(256) NOT NULL";
        
        $this->conn->exec($createTableCon);
                                
        }
}
