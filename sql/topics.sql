use IT5233;
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
