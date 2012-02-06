
CREATE TABLE Node
(
	node_id		INT NOT NULL AUTO_INCREMENT,
	map_id		INT,
	created_by	INT,
	position_x	DOUBLE,
	position_y	DOUBLE,
	value		VARCHAR(255),
	type		INT,
	
	PRIMARY KEY(node_id),
	FOREIGN KEY(map_id) REFERENCES Map(map_id)
		ON DELETE SET NULL
		ON UPDATE CASCADE,
	FOREIGN KEY(created_by) REFERENCES Accounts(account_id)
		ON DELETE SET NULL
		ON UPDATE CASCADE
);