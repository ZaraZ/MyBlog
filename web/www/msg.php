<meta charset="utf8">
<?php
/**
* msg.php blog留言列表
*
* @author Abra <xiangyunz@outlook.com> //作者邮箱
* @link https://github.com/ZaraZ       //作者的github
* @since 0.1 2016年12月6日             //版本号及日期
* @copyright GPL
*
*/



// //连接数据库，并把留言内容赋值给 $msgcontent
// $host = '127.0.0.1';
// $root = 'root';
// $pwd = 'admin';
// $conn = mysql_connect($host, $root, $pwd);
// mysql_select_db("my_blog", $conn);  //选择数据库
// mysql_query("set names 'utf8'"); //设定字符集
//
// $sql_select = "select * from msg";
// $res_select = mysql_query($sql_select);
// $msglist = array();
// while ($row = mysql_fetch_assoc($res_select)) {
//   $msglist[] = $row;
// }
//
// include('./view/msg.html');


require('./lib/init.php');

if (!fLogin()) {
  header('Location:sign_in.php');
}else {
  $sql = "select * from msg";
  $msglist = mGetAll($sql);

  include(www . '/view/msg.html');
}

 ?>
