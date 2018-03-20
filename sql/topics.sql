use IT5233;
create table topics
(
  topicID varchar(16) not null unique primary key,
  title varchar(64) not null,
  userID varchar(16) not null,
  content varchar(2000) not null,
  timeCreated datetime not null default current_timestamp,
  attachmentID integer null,
  foreign key (userID)
  references users(userID),
  foreign key (attachmentID)
  references attachments(attachmentID)
);
