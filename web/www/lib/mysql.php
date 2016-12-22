<meta charset="utf8">
<?php

/**
* mysql.php 数据库相关操作函数
*
* @author Abra <xiangyunz@outlook.com> //作者邮箱
* @link https://github.com/ZaraZ       //作者的github
* @since 0.1 2016年12月16日             //版本号及日期
* @copyright GPL
*
*/

/**
* 连接数据库
*
* @return resource 连接成功，返回连接数据库的资源
*/
function mConn() {
  static $conn = null;
  if($conn === null){
    $cfg = require(www. './lib/config.php');
    $conn = mysql_connect($cfg['host'], $cfg['user'], $cfg['pwd']);
    mysql_select_db($cfg['db'], $conn);  //选择数据库
    mysql_query('set names '.$cfg['charset'], $conn); //设定字符集
  }
  return $conn;
}

/**
*
* 查询的函数
* @return mixed resource/bool
*/
function mQuery($sql){
  return mysql_query($sql, mConn());
}

/**
*
* select 查询返回二维数据
*
* @param str $sql select待查询的sql语句
* @return mixed select查询成功，返回二维数组，失败返回false
*/
function mGetAll($sql){
  $rs = mQuery($sql);
  if (!$rs) {
    return false;
  }

  $data = array();
  while ($row = mysql_fetch_assoc($rs)) {
    $data[] = $row;
  }
  return $data;
}

// $sql = "select * from users";
// var_dump(mGetAll($sql));


/**
*
* 取出一行数据

* @param str $sql 待查询的sql语句
* @return arr/false 查询成功 返回一个一维数组
*/

function mGetRow($sql){
  $rs = mQuery($sql);
  if(!$rs){
    return false;
  }

  return mysql_fetch_assoc($rs);
}

// $sql = "select * from users where user_id = 1";
// var_dump(mGetRow($sql));


/**
*
* 查询返回一个结果
* @param str @sql 待查询的sql语句
* @return mixed 查询成功，返回结果；失败，返回false
*/

function mGetOne($sql){
  $rs = mQuery($sql);
  if (!$rs) {
    return false;
  }

  return mysql_fetch_row($rs)[0];
}


// $sql = "select count(*) from users where auth = 2";
// var_dump(mGetOne($sql));


/**
*
* 自动拼接insert和update sql语句，并且调用mQuery()去执行sql
*
* @param str $table 表名
* @param arr $data 接受到的数据，一维数组
* @param str $act 动作，默认为'insert'
* @param str $where 防止update更改时少加where条件
* @return bool insert 或者 upadte 插入成功或失败
*/

function mExec($table, $data, $act = 'insert', $where = 0){
  if($act == 'insert'){
    $sql = "insert into $table (";
    $sql .= implode(',', array_keys($data)) . ") values('";
    $sql .= implode("','", array_values($data)) . "')";
    return mQuery($sql);
  }elseif ($act == 'update') {
    $sql = "update $table set ";
    foreach ($data as $key => $value) {
      $sql .= $key . "='" . $value . "',";
    }
    $sql = rtrim($sql,',') . "where" . $where;
    return mQuery($sql);
  }
}
// $data = array('msgid' => 1, 'msgcontent' => 'testtest');
// mExec('msg', $data);
/**
* 去的上一步insert操作产生的主键id
*
*/

function getLastId(){
  return mysql_insert_id( mConn());
}


 ?>