create table topics
(
  topicID integer not null unique,
  title varchar(64) not null,
  author integer not null,
  content varchar(2000) not null,
  primary key (topicID),
  foreign key (author) references users(userid)
);
create table comments
(
  commentID integer not null unique,
  author integer not null,
  content varchar(2000) not null,
  primary key (commentID),
  foreign key (author) references users(userid)
);
create table topic_comments
(
  topicID integer not null,
  commentID integer not null,
  constraint fk_topic_comment primary key (topicID, commentID)
);
