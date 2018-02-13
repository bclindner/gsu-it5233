use IT5233;
create table topics
(
  topicID integer not null unique auto_increment,
  title varchar(64) not null,
  author varchar(255) not null, /* for simplicity - we'd normally use foreign key*/
  content varchar(2000) not null,
  timeCreated datetime not null,
  primary key (topicID),
);
create table comments
(
  commentID integer not null unique auto_increment,
  author varchar(255) not null, /* for simplicity - we'd normally use foreign key*/
  content varchar(2000) not null,
  timeCreated datetime not null,
  primary key (commentID),
);
create table topic_comments
(
  topicID integer not null auto_increment,
  commentID integer not null,
  constraint fk_topic_comment primary key (topicID, commentID)
);
