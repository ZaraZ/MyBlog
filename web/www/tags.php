<meta charset="utf8">
<?php
/**
* tags.php blog日志标签页
*
* @author Abra <xiangyunz@outlook.com> //作者邮箱
* @link https://github.com/ZaraZ       //作者的github
* @since 0.1 2016年12月6日             //版本号及日期
* @copyright GPL
*
<<<<<<< HEAD
*/

  require('./lib/init.php');

  $sql = "select * from tags";
  $taglist = mGetAll($sql);

=======
*/

  require('./lib/init.php');

  $sql = "select * from tags";
  $taglist = mGetAll($sql);
  
>>>>>>> a68e9f463226bddc8b13f04042c52f2fdabed10a
  include('./view/tags.html');
 ?>
