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
*/

  require('./lib/init.php');

  $sql = "select * from tags";
  $taglist = mGetAll($sql);

  include('./view/tags.html');
 ?>
