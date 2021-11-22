DROP DATABASE IF EXISTS bugme;


-- Creation of the bugme database
CREATE DATABASE bugme;


USE bugme;


-------------------------------------
-- Construction of the 'users' table
-------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
    `id` int(11) NOT NULL auto_increment,
    `firstname` char(25) NOT NULL default '',
    `lastname` char(25) NOT NULL default '',
    `password` char(25) NOT NULL default '',
    `email` char(25) NOT NULL default '',
    `date_joined` DATETIME NOT NULL default DATETIME,

    PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4080 DEFAULT CHARSET=utf8mb4;