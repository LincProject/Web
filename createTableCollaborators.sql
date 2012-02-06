
CREATE TABLE Collaborators
(
	collaboration_id	INT NOT NULL AUTO_INCREMENT,,
	user_id				INT,
	map_id				INT,
	privileges 			varchar(255),
	
	PRIMARY KEY(collaboration_id),
	FOREIGN KEY(user_id) REFERENCES Accounts(account_id)
		ON DELETE SET NULL
		ON UPDATE CASCADE,
	FOREIGN KEY(map_by) REFERENCES Map(map_id)
		ON DELETE SET NULL
		ON UPDATE CASCADE
);