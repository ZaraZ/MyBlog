<meta charset="utf8">
<?php
/**
* artical_content.php blog日志详情页
*
* @author Abra <xiangyunz@outlook.com> //作者邮箱
* @link https://github.com/ZaraZ       //作者的github
* @since 0.1 2016年12月6日             //版本号及日期
* @copyright GPL
*
*/

if (empty($_POST)) {
    include('./view/msg_add.html');     //若没有输入，点击提交还是引入当前页面
} else {
    //连接数据库，并把留言内容赋值给 $msgcontent
    $msgcontent = trim($_POST["msg_content"]);    //用trim( )函数来移除提交的留言首位的空白字符
    $host = '127.0.0.1';
    $root = 'root';
    $pwd = 'admin';
    $conn = mysql_connect($host, $root, $pwd);
    mysql_select_db("my_blog", $conn);  //选择数据库
    mysql_query("set names 'utf8'"); //设定字符集

    //检测留言是否为空
    if (empty($msgcontent)) {
        echo '留言不能为空';
        exit();
    }else {   //将留言内容写入数据库
      $sql_insert = "insert into msg (msg_content) values('$msgcontent')";
      $res_insert = mysql_query($sql_insert);
      if ($res_insert) {
        echo '留言成功！';
        exit();
      }else {
        echo '系统繁忙，请稍候！';
        exit();
      }
    }
}

?>
