<meta charset="utf8">
<?php
/**
* msg_delete.php 留言删除
*
* @author Abra <xiangyunz@outlook.com> //作者邮箱
* @link https://github.com/ZaraZ       //作者的github
* @since 0.1 2016年12月16日             //版本号及日期
* @copyright GPL
*
*/

require('./init.php');

//msg_id
$msg_id = $_GET['msg_id'];

// //连接数据库，并把留言内容赋值给 $msgcontent
// $host = '127.0.0.1';
// $root = 'root';
// $pwd = 'admin';
// $conn = mysql_connect($host, $root, $pwd);
// mysql_select_db("my_blog", $conn);  //选择数据库
// mysql_query("set names 'utf8'"); //设定字符集

if (!is_numeric($msg_id)) {
  echo "<script>alert('ERRO！请检查留言地址！'); window.location.assign('../msg.php');</script>";
}else {
  $sql = "select msg_id from msg where msg_id = '$msg_id'";
  $sql_rel = mQuery($sql);
  $num = mGetRow($sql_rel);
  if (!$num) {
    echo "<script>alert('不存在该留言'); window.location.assign('../msg.php');</script>";
  }else {
    $msg_del = mQuery("delete from msg where msg_id = '$msg_id'");
    if (!$msg_del) {
      echo "<script>alert('留言删除失败');window.location.assign('../msg.php');</script>";
      }else {
        echo "<script>alert('留言删除成功！');window.location.assign('../msg.php');</script>";
      }
  }
}

?>
