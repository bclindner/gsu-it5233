use IT5233;
create table users (
  userID int not null auto_increment,
  username varchar(255) not null unique,
  password varchar(255) not null,
  question varchar(255) not null,
  answer varchar(255) not null,
  is_admin boolean default 0 not null,
  primary key (userid)
);
