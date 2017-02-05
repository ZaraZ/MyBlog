<meta charset="utf8">
<?php

/**
* func.php 与数据库无关的方法
*
* @author Abra <xiangyunz@outlook.com> //作者邮箱
* @link https://github.com/ZaraZ       //作者的github
* @since 0.1 2017年02月05日             //版本号及日期
* @copyright GPL
*
*/


/**
*
* 获取当前北京时间
* @return 当前北京时间
*/
function mTime(){
  date_default_timezone_set('Asia/Shanghai');
  $t = time();
  return date("Y-m-d H:i:s", $t);
}

// $t = mTime();
// echo $t;

?>