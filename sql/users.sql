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
-- example data
-- user "root", password "Horse Correct Battery Stapl3"
INSERT INTO users (userID, username, password, question, answer)
  VALUES ("96423cecf69c5756", "root", "$2y$10$H1yqLVK/55g9bHnEJViMDOeAT7laf7guS6798vCHqZp2Zy47qI6l.", "secret security question", "secret security answer");
-- user "kermit", password "thefrog"
INSERT INTO users (userID, username, password, question, answer)
  VALUES ("120ebb854a02d07c", "kermit", "$2y$10$pJ4I9.gnDjLNG3XV4AhpTuNfy8YN1MJI0qyW3A2816GiaIgxDuW52", "ribbit", "ribbit");
-- user "wednesday_frog", password "wednesday"
INSERT INTO users (userID, username, password, question, answer)
  VALUES ("49331b3ea6becb05", "wednesday_frog", "$2y$10$SByT8rkq1rxfLic/eFijOOvd4FAlFWQXj.KEJdThF/G7LE.U30SW.", "what is the best day", "wednesday");
-- user "slippy", password "toad"
INSERT INTO users (userID, username, password, question, answer)
  VALUES ("659c8f418840f581", "slippy", "$2y$10$bWOfLsriTfXk2PPPjeNya.SbNGko7A/uHwE4WdFLT298Xckk.l0Sm",  "ribbit", "ribbit");
