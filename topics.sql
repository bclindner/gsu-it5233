use IT5233;
create table topics
(
  topicID varchar(16) not null unique,
  title varchar(64) not null,
  userID varchar(16) not null,
  content varchar(2000) not null,
  timeCreated datetime not null,
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
  timeCreated datetime not null,
  primary key (commentID),
  foreign key (topicID)
  references topics(topicID),
  foreign key (userID)
  references users(userID)
);
