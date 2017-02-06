<meta charset="utf8">
<?php
/**
* logout.php 用户登出页
*
* @author Abra <xiangyunz@outlook.com> //作者邮箱
* @link https://github.com/ZaraZ       //作者的github
* @since 0.1 2017年02月05日             //版本号及日期
* @copyright GPL
*
*/
  require('./lib/init.php');

  if (!fLogin()) {
    header('Location:sign_in.php');
  }else {
    setcookie('name', null, 0);
    setcookie('code', null, 0);
    header('Location:index.php');
  }
 ?>
