
CREATE TABLE Collaborators
(
	collaboration_id	int,
	user_id				int,
	map_id				int,
	privileges 			varchar(255),
	
	PRIMARY KEY(collaboration_id),
	FOREIGN KEY(user_id) REFERENCES Accounts(account_id)
		ON DELETE SET NULL
		ON UPDATE CASCADE,
	FOREIGN KEY(map_by) REFERENCES Map(map_id)
		ON DELETE SET NULL
		ON UPDATE CASCADE
);