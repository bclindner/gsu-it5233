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
-- sample topics data (requires topics and users data)
-- by: wednesday_frog
INSERT INTO topics (topicID, title, userID, content)
  VALUES ("82d86e77cac2bdf3", "it is wednesday, my dudes", "49331b3ea6becb05", "it is wednesday, my dudes");
-- by: kermit
INSERT INTO topics (topicID, title, userID, content)
  VALUES ("c82d86e77cac2bdf3", "ribbit", "120ebb854a02d07c", "ribbit");
-- sample comments data (requires topics and users data)
-- by: kermit, on: "it is wednesday, my dudes"
INSERT INTO comments (topicID, commentID, userID, content)
  VALUES ("82d86e77cac2bdf3", "8fd3e3eaafe3d4ef", "120ebb854a02d07c", "ffs not everything is about wednesdays");
-- by: slippy, on: "ribbit"
INSERT INTO comments (topicID, commentID, userID, content)
  VALUES ("c82d86e77cac2bdf3", "3d5ed9d5e3945514", "659c8f418840f581", "ribbit");
