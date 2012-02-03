
CREATE TABLE Map
(
	map_id			INT,
	creator			INT,
	name			varchar(255),
	description		TINYTEXT,
	auth 			TINYINT,
	date_created	DATETIME,
	
	PRIMARY KEY(map_id),
	FOREIGN KEY(creator) REFERENCES Accounts(account_id)
		ON DELETE SET NULL
		ON UPDATE CASCADE,
);