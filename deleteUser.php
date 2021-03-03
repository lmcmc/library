<?php
include_once("header.php");
include_once("conn.php");
$userid = empty($_GET['user_id'])?'':trim($_GET['user_id']);
$delete1 = $db->delete("user",array("AND"=>array("id"=>$userid)));
$delete2 = $db->delete("borrow_list",array("AND"=>array("id"=>$userid)));
echo "<script>alert('删除成功！')</script>";
echo "<script>location='admin.php'</script>";
?>