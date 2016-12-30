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
require('./lib/init.php');

$artid = $_GET['artical_id'];
$sql = "select * from articals where artical_id = $artid";
$rs = mGetRow($sql);

include('./view/artical_content.html');
?>
