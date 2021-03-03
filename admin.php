<?php
include_once('header.php');
include_once("conn.php");

$select1 = $db->select("user","*");

echo "<table border='0px #4169E1solid' width='600px' align='center' style='margin-top: 60px;' cellpadding='0' cellspacing='0' bgcolor=\"#87CEFA\">";
echo "<caption style='text-align:center;text-shadow: 0 0 10px #4682B4,0 0 10px #4682B4,0 0 10px #4682B4,0 0 20px #4682B4;margin-bottom:30px;'><h3 style='font-size:30px;color:white;'>User Management Information</h3></caption>";
echo "<tr style='line-height: 40px;'><th style='text-align:center;background-color: rgb(81, 130, 187);color: #fff;'>User ID</th><th style='text-align:center;background-color: rgb(81, 130, 187);color: #fff;'>User Name</th><th style='text-align:center;background-color: rgb(81, 130, 187);color: #fff;'>Class</th><th style='text-align:center;background-color: rgb(81, 130, 187);color: #fff;'>Last Time</th><th style='text-align:center;background-color: rgb(81, 130, 187);color: #fff;'>Operation</th></tr>";
foreach ($select1 as $row){
    if($row['admin']!=1){
        echo "<tr style='text-align: center;line-height: 40px'>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['class']."</td>";
        echo "<td>".$row['last_login_time']."</td>";
        $id = $row['id'];
        echo "<td>"."<a href='borrowInfo.php?user_id=$id'>详情</a>"."&nbsp&nbsp&nbsp<a href='alteruser.php?user_id=$id'>修改</a>"."&nbsp&nbsp&nbsp<a href='deleteUser.php?user_id=$id'>删除</a>"."</td>";
        echo "</tr>";
    }
}
echo "</table>";
?>
<ul class="bg-bubbles">
	<li></li>
	<li></li>
	<li></li>
	<li></li>
	<li></li>
	<li></li>
	<li></li>
	<li></li>
	<li></li>
	<li></li>
	</ul>