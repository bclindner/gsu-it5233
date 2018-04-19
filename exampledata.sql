use it5233;
-- users

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

-- topics

-- by: wednesday_frog
INSERT INTO topics (topicID, title, userID, content)
  VALUES ("82d86e77cac2bdf3", "it is wednesday, my dudes", "49331b3ea6becb05", "it is wednesday, my dudes");
-- by: kermit
INSERT INTO topics (topicID, title, userID, content)
  VALUES ("c82d86e77cac2bdf3", "ribbit", "120ebb854a02d07c", "ribbit");

-- comments

-- by: kermit, on: "it is wednesday, my dudes"
INSERT INTO comments (topicID, commentID, userID, content)
  VALUES ("82d86e77cac2bdf3", "8fd3e3eaafe3d4ef", "120ebb854a02d07c", "ffs not everything is about wednesdays");
-- by: slippy, on: "ribbit"
INSERT INTO comments (topicID, commentID, userID, content)
  VALUES ("c82d86e77cac2bdf3", "3d5ed9d5e3945514", "659c8f418840f581", "ribbit");
