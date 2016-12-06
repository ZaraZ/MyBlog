create table users (
  user_id mediumint(8) unsigned primary key auto_increment,
  auth smallint(2) unsigned not null default '2',
  user_name varchar(10) not null default '',
  psw int(20) not null default '666666',
  email varchar(30) not null default '',
  last_login datetime
)engine=myisam default charset=utf8;

create table tags(
  tag_id mediumint(8) unsigned primary key auto_increment,
  tag_name varchar(10) not null default '',
  art_num int(5) unsigned not null default '0'
)engine=myisam default charset=utf8;

create table articals(
  artical_id  int(5) unsigned primary key auto_increment,
  tag_id mediumint(8) unsigned,
  user_id mediumint(8) unsigned,
  title varchar(20) not null default '无题',
  art_content text,
  pubtime datetime,
  last_modify datetime
)engine=myisam default charset=utf8;

create table msg(
  msg_id  int(5) unsigned primary key auto_increment,
  user_id mediumint(8) unsigned,
  msg_content text,
  pubtime datetime
)engine=myisam default charset=utf8;
