# MyBlog

***
### 进度：
2017.02.03
* tag 列表页面& tag 下的日志列表；

2017.02.02
* tag列表页面；
* 已知bug，新增日志时若未存在该分类标签，则数据库中articals 表内不会记录该日志的tag类；

2017.01.30
* 改写mysql.php内函数方法，修复留言列表显示bug；
* 增添留言写入时记录时间；
* 增添日志写入时记录时间；

2017.01.29
* 将文件上传至服务器；
* 修改了msg.php页面关于留言列表的相关代码；
* 修改sign_up_check.php、sign_in_check.php页面代码；

2016.12.30
* 日志正文页面显示（已有bug：无法正确显示换行）；

2016.12.25
* 可以写入段落；
* 日志列表页面可读取数据；

2016.12.24
* 新增日志添加功能（不能写入段落）；

2016.12.22
* 新增配置文件及初始文件；
* 将留言板用封装函数进行实现；
* 添加日志记录功能，在mysql.php 中的 mLog()；

2016.12.16
* 完成留言的删除；
* 修复“新增留言、删除留言后”页面跳转问题；
* 将方法类文件归至lib文件夹下；
* 封装部分与数据库相关的函数；

2016.12.08
* 写留言以及留言列表功能；

2016.12.07
* 完成登陆功能；

2016.12.06
* 新建php文件并进行html文件引入；
* 完成注册功能

2016.12.04
* 完成日志、留言详情页与写入页，完成tags页面与about页面（即大体前端静态页面完成）；

2016.12.03
* 调整留言列表显示需求；
* 调整所有页面中container内容，增加类名为"board"的div；
* 完成首页静态页面(index.html & index.css)；
* 完成日志列表、留言列表静态页面(artical.html、msg.html & list.css)；

2016.12.02
* 制作前端原型(By MockPuls)；
* 完成页面布局模板及样式(default.html & default.css)；
* 完成登陆 & 注册页面(sign_in.html & sign_up.html)；
* 上传后备背景图、header部分背景图渐变色调整；

2016.12.01
* 整理结构以及需求，建立数据库结构图(By Xmind)；

***
### 博客需求
#### 目的：
通过所学知识自己搭建一个简单的个人博客。
#### 需求：
* 用户有权限，分为管理员权限、博主权限、游客权限。其中管理员权限可以对所有用户（除自己）、日志、留言进行增删改；博主权限可以对自己的日志、留言进行增删改；游客权限只能对网站进行浏览。
* 日志需有标题、正文。正文可以为空，标题不能为空。
* 日志详情页需显示写作时间、作者、内容、上次修改时间，时间精确到年月日时分秒。
* 首页日志显示只显示前三篇日志的日志标题、正文前100字的预览、作者、时间，时间精确到年月日时分秒，其余通过点击日志正文或标题区域进入日志详情页来显示。
* 日志列表显示所有的日志标题、作者、写作时间，时间精确到年月日。每页最多显示10篇日志，其余通过翻页继续显示。博主可在列表中每项最后点击删除按钮对相应日志进行删除。
* 一条留言最多140字。
* 首页留言板只显示留言内容前50字以及留言时间，时间精确到月日。最多显示5条留言，剩余通过点击更多进入留言列表显示。
* 留言列表中显示留言 ~~全部内容~~ 前20字，作者，时间，时间精确到年月日时分秒。每页最多显示 ~~15~~ 10条留言，其余通过翻页继续显示。博主可在列表中每项最后点击删除按钮对相应留言进行删除。
* Tags页面仅通过首页点击Tags栏进入，显示所有文章的标签，并且通过点击标签可以进入相应标签下的所有日志，标签后用括号显示使用次数。
* About页面后续再添加需求说明，暂时空着。。。

***
### 数据库：my_blog
#### 建表语句：

    create table users (
      user_id mediumint(8) unsigned primary key auto_increment,
      auth smallint(2) unsigned not null default '2',
      user_name varchar(10) not null default '',
      psw varchar(20) not null default '666666',
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
