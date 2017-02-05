<meta charset="utf8">
<?php
/**
* sign_in_check.php 登陆逻辑处理
*
* @author Abra <xiangyunz@outlook.com> //作者邮箱
* @link https://github.com/ZaraZ       //作者的github
* @since 0.1 2016年12月6日             //版本号及日期
* @copyright GPL
*
*/

require('./lib/init.php');


if (isset($_POST["submit"]) && $_POST["submit"] == "登陆") {
    $user = $_POST["user_name"];
    $psw = $_POST["psw"];
    // $host = '127.0.0.1';
    // $root = 'root';
    // $pwd = 'admin';
    if ($user == "" || $psw == "") {
        echo "<script>alert('请输入用户名或密码！'); history.go(-1);</script>";
    } else {
      //   $con = mysql_connect($host, $root, $pwd);   //连接数据库
      //  mysql_select_db("my_blog");  //选择数据库
      //  mysql_query("set names 'utf8'"); //设定字符集
       $sql = "select user_name, psw from users where user_name = '$user' and psw = '$psw'"; //SQL语句
      //  $result = mysql_query($sql);    //执行SQL语句
       $num = mGetRow($sql); //统计执行结果影响的行数
       if ($num) {    //匹配到用户名及密码
          echo "<script>alert('登陆成功');</script>";
          setcookie('name', $num['user_name']);
          header('Location:../index.php');
       } else {    //没有匹配成功
                 echo "<script>alert('用户名或密码不正确！');history.go(-1);</script>";
             }
        }
    }
 else {
    echo "<script>alert('提交未成功！'); history.go(-1);</script>";
}
?>
