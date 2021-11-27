DROP DATABASE IF EXISTS bugme;


CREATE DATABASE bugme;


USE bugme;



DROP TABLE IF EXISTS Users;

CREATE TABLE Users (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `firstname` char(25) NOT NULL default '',
    `lastname` char(25) NOT NULL default '',
    `password` char(50) NOT NULL default '',
    `email` char(25) NOT NULL default '',
    `date_joined` DATETIME NOT NULL,

    PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4080 DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS Issues;

CREATE TABLE Issues (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `title` char(25) NOT NULL default '',
    `description` TEXT NOT NULL default '',
    `type` char(25) NOT NULL default '',
    `priority` char(15) NOT NULL default '',
    `assigned_to` int(11) NOT NULL,
    `created_by` int(11) NOT NULL,
    `created` DATETIME NOT NULL,
    `updated` DATETIME NOT NULL,

    PRIMARY KEY (`id`),
    FOREIGN KEY (`created_by`) REFERENCES Users(`id`),
    FOREIGN KEY (`assigned_to`) REFERENCES Users(`id`)

) ENGINE=MyISAM AUTO_INCREMENT=4080 DEFAULT CHARSET=utf8mb4;


INSERT INTO Users VALUES (DEFAULT,'James','Gordon', MD5('password123'),'admin@project2.com', ADDTIME(CURRENT_DATE(), CURRENT_TIME()));

