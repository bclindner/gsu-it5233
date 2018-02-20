use IT5233;
create table topics
(
  topicID integer not null unique auto_increment,
  title varchar(64) not null,
  userID int not null,
  content varchar(2000) not null,
  timeCreated datetime not null,
  primary key (topicID),
  foreign key (userID)
  references users(userID)
);
create table comments
(
  commentID integer not null unique auto_increment,
  topicID integer not null,
  userID int not null,
  content varchar(2000) not null,
  timeCreated datetime not null,
  primary key (commentID),
  foreign key (topicID)
  references topics(topicID),
  foreign key (userID)
  references users(userID)
);
