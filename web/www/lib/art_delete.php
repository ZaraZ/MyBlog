<meta charset="utf8">
<?php
/**
* art_delete.php 留言删除
*
* @author Abra <xiangyunz@outlook.com> //作者邮箱
* @link https://github.com/ZaraZ       //作者的github
* @since 0.1 2017年02月06日             //版本号及日期
* @copyright GPL
*
*/

require('./init.php');

//artical_id
$artical_id = $_GET['artical_id'];

if (!is_numeric($artical_id)) {
  echo "<script>alert('ERRO！请检查留言地址！'); window.location.assign('../artical.php');</script>";
}else {
  $sql = "select artical_id from articals where artical_id = '$artical_id'";
  $sql_rel = mQuery($sql);
  $num = mysql_num_rows($sql_rel);   //通过搜索条目数量判断是否存在该留言
  if (!$num) {
    echo "<script>alert('不存在该日志'); window.location.assign('../person.php');</script>";
  }else {
    $art_del = mQuery("delete from articals where artical_id = '$artical_id'");
    if (!$art_del) {
      echo "<script>alert('日志删除失败');window.location.reload();</script>";
      }else {
        echo "<script>alert('日志删除成功！');window.location.reload();</script>";
      }
  }
}

?>
