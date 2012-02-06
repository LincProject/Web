
CREATE TABLE Map
(
	map_id			INT NOT NULL AUTO_INCREMENT,
	creator			INT,
	name			varchar(255),
	description		MEDIUMTEXT,
	auth 			INT,
	date_created	DATETIME,
	
	PRIMARY KEY(map_id),
	FOREIGN KEY(creator) REFERENCES Accounts(account_id)
		ON DELETE SET NULL
		ON UPDATE CASCADE
);