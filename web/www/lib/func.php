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
function fTime(){
  date_default_timezone_set('Asia/Shanghai');
  $t = time();
  return date("Y-m-d H:i:s", $t);
}

// $t = fTime();
// echo $t;

/**
*
* 检测是否登录
* @return bool 是否登陆
*/
function fLogin(){
  // return isset($_COOKIE['name']);
  if (!isset($_COOKIE['name']) || !isset($_COOKIE['code'])) {
    return false;
  }
  return $_COOKIE['code'] === fUsername($_COOKIE['name']);
}

/**
* 转义字符串，对Post、Get、Cookie 数组进行转义
* @param $arr 需要转义的数组
* @return $arr 转义后的数组
*/
function fAddslashes($arr){
  foreach ($arr as $k => $v) {
    if(is_string($v)){
      $arr[$k] = addslashes($v);
    }elseif (is_array($v)) {
      $arr[$k] = fAddslashes($v);
    }
  }
  return $arr;
}


/**
* 加密用户名
* @param str @name 用户名
* @return str 加密后的用户名
*/
function fUsername($name){
  $cfg = include(www . '/lib/config.php');
  $salt = $cfg['salt'];
  return md5($name . '|'. $salt);
}



/**
* 正文内容截取，以便首页预览
* @param str $type 待处理的类型，默认为artical 可选msg;
* @param arr $array 待处理的数组；
* @param int $num 预览长度；
* @return arr 返回处理后的数组
*/
function fPreview($type = 'artical', $array, $num){
    foreach ($array as $k => $v) {
      if ($type == 'artical') {
        $m = $v['art_content'];
        $array[$k]['art_content'] = substr($m, -strlen($m), $num) . "...";
      }elseif ($type == 'msg') {
        $m = $v['msg_content'];
        $array[$k]['msg_content'] = substr($m, -strlen($m), $num) . "...";
      }
    }
    return $array;
}

?>
