CREATE DATABASE if not exists n01304773;

  use n01304773;

  CREATE TABLE if not exists n01304773.users (
    id int,
    firstname VARCHAR(30) NOT NULL,
	lastname VARCHAR(30) NOT NULL,
	PRIMARY KEY (id)
  );
  
  CREATE TABLE if not exists n01304773.addresses (
  user_id int, -- Both a primary and foreign key
  city varchar(30) NOT NULL,
  country varchar(30) NOT NULL,
  PRIMARY KEY (user_id),
  FOREIGN KEY (user_id) REFERENCES n01304773.users (id) ON DELETE CASCADE
);


INSERT INTO n01304773.users VALUES(1,'Mike', 'Tyson');
INSERT INTO n01304773.users VALUES(2,'Joe', 'Fraizer');
INSERT INTO n01304773.users VALUES(3,'Anthony', 'Joshua');

INSERT INTO n01304773.addresses VALUES(1,'Brookyln', 'US');
INSERT INTO n01304773.addresses VALUES(2,'Philadelphia', 'US');
INSERT INTO n01304773.addresses VALUES(3,'London', 'England');
