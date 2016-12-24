<meta charset="utf8">
<?php
/**
* artical_add.php blog新增日志页
*
* @author Abra <xiangyunz@outlook.com> //作者邮箱
* @link https://github.com/ZaraZ       //作者的github
* @since 0.1 2016年12月6日             //版本号及日期
* @copyright GPL
*
*/
  require('./init.php');

  if(empty($_POST)){
    include(www . '/view/artical_add.html');     //若没有输入，点击提交还是引入当前页面
  }else{
    $title = trim($_POST["title"]);       //用trim( )函数来移除提交的首位的空白字符
    $tagname = trim($_POST["tagname"]);
    $text = trim($_POST["content"]);

    //检测日志内容是否为空
    if(empty($text)){
      echo "<script>alert('日志内容不能为空！');window.location.assign('./artical_add.php');</script>";
      exit();
    }elseif (empty($tagname)) {
      //若标签为空，则将标签分为“未分类”
      $tagname = "未分类";
      $data = array("tag_id" => mTag($tagname),"title" => $title,"art_content" => "$text");
      $res_insert = mExec('articals', $data);
      if ($res_insert) {
        echo "<script>alert('日志发布成功！');window.location.assign('../artical.php');</script>";
        exit();
      }else {
        echo "<script>alert('系统繁忙，请稍候！');window.location.assign('../artical.php');</script>";
        exit();
      }
    }else {
      //若标签不为空时
      $data = array("tag_id" => mTag($tagname),"title" => $title,"art_content" => "$text");
      $res_insert = mExec('articals', $data);
      if ($res_insert) {
        echo "<script>alert('日志发布成功！');window.location.assign('../artical.php');</script>";
        exit();
      }else {
        echo "<script>alert('系统繁忙，请稍候！');window.location.assign('../artical.php');</script>";
        exit();
      }
    }
  }
 ?>
