DROP DATABASE IF EXISTS bugme;


-- Creation of the database
CREATE DATABASE bugme;


USE bugme;


-------------------------------------
-- Construction of the 'users' table
-------------------------------------

DROP TABLE IF EXISTS 'users';

CREATE TABLE 'users' (
    'id' int(11) NOT NULL auto_increment,
    'firstname' char(25) NOT NULL default '',
    'lastname' char(25) NOT NULL default '',
)