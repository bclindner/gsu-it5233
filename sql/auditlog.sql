CREATE TABLE auditlog (
  logID integer not null auto_increment primary key,
  logDate datetime not null,
  logDesc varchar(255) not null,
  logIP varchar(45) not null,
  logUserID varchar(16) null,
);
