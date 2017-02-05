<meta charset="utf8">
<?php
/**
* artical.php blog日志列表
*
* @author Abra <xiangyunz@outlook.com> //作者邮箱
* @link https://github.com/ZaraZ       //作者的github
* @since 0.1 2016年12月6日             //版本号及日期
* @copyright GPL
*
*/
  require('./lib/init.php');
  if (!fLogin()) {
    header('Location:sign_in.php');
  }else {
    $sql = "select * from articals";
    $articallist = mGetAll($sql);

    include(www . '/view/artical.html');
  }

 ?>
