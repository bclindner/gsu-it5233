CREATE TABLE users (
  userid int NOT NULL AUTO_INCREMENT,
  username varchar(255) NOT NULL UNIQUE,
  password varchar(255) NOT NULL,
  question varchar(255) NOT NULL,
  answer varchar(255) NOT NULL,
  PRIMARY KEY (userid)
);
