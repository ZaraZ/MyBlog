<meta charset="utf8">
<?php
/**
* tags_detal.php blog标签详情页
*
* @author Abra <xiangyunz@outlook.com> //作者邮箱
* @link https://github.com/ZaraZ       //作者的github
* @since 0.1 2016年12月6日             //版本号及日期
* @copyright GPL
*
*/

  require('./lib/init.php');

  $tagid = $_GET['tag_id'];
  $sql = "select * from tags where tag_id = $tagid";
  $rs = mGetRow($sql);
  
  include('./view/tags_detail.html');
 ?>
