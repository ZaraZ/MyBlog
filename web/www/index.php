<meta charset="utf8">
<?php
/**
* index.php blog首页
*
* @author Abra <xiangyunz@outlook.com> //作者邮箱
* @link https://github.com/ZaraZ       //作者的github
* @since 0.1 2016年12月6日             //版本号及日期
* @copyright GPL
*
*/

  require('./lib/init.php');

  $artPre = mPreview('artical', 3);
  $msgPre = mPreview('msg', 5);
  $tagPre = mPreview('tag', 5);

  include('./view/index.html');

 ?>
