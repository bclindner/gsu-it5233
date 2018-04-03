use IT5233;
create table users (
  userID varchar(16) not null,
  username varchar(255) not null unique,
  password varchar(255) not null,
  question varchar(255) not null,
  answer varchar(255) not null,
  is_admin boolean default 0 not null,
  primary key (userid)
);

create table topics
(
  topicID varchar(16) not null unique,
  title varchar(64) not null,
  userID varchar(16) not null,
  content varchar(2000) not null,
  timeCreated datetime not null default current_timestamp,
  primary key (topicID),
  foreign key (userID)
  references users(userID)
);

create table comments
(
  commentID varchar(16) not null unique,
  topicID varchar(16) not null,
  userID varchar(16) not null,
  content varchar(2000) not null,
  timeCreated datetime not null default current_timestamp,
  primary key (commentID),
  foreign key (topicID)
  references topics(topicID),
  foreign key (userID)
  references users(userID)
);

create table auditlog (
  logID integer not null auto_increment primary key,
  logDate datetime not null,
  logDesc varchar(255) not null,
  logIP varchar(45) not null,
  logUserID varchar(16) null
);

