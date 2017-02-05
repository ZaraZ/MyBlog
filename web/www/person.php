<meta charset="utf8">
<?php
/**
* person.php 个人中心
*
* @author Abra <xiangyunz@outlook.com> //作者邮箱
* @link https://github.com/ZaraZ       //作者的github
* @since 0.1 2017年02月06日             //版本号及日期
* @copyright GPL
*
*/


require('./lib/init.php');

if (!fLogin()) {
  header('Location:sign_in.php');
}else {
  $user = $_COOKIE['name'];
  $userid = mUser($user);

  //选中文章
  $sql1 = "select * from articals where user_id = $userid";
  $articallist = mGetAll($sql1);

  //选中留言
  $sql2 = "select * from msg where user_id = $userid";
  $msglist = mGetAll($sql2);

  include(www . '/view/person.html');
}

?>
