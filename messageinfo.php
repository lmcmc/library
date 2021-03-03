<?php
header('Content-type: text/html; charset=UTF8');
include_once('header.php');
include_once("conn.php");
?>
<h2 style="text-align:center;margin-top:60px;text-shadow: 0 0 10px #87CEFA,0 0 10px #87CEFA,0 0 10px #87CEFA,0 0 20px #87CEFA; color:white;">Messages</h2>
<div style="margin:30px auto;width:800px;background-color:rgba(135,206,250,0.2);">
<?php
$select1 = $db->select("message","*");
foreach ($select1 as $row){
    echo "<font style='font-size: 18px;line-height:40px;margin-top:5px;color:#48D1CC;'>{$row['name']} 于 {$row['time']} 有感。</font><br>";
    echo "<font style='font-size: 18px;line-height:40px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$row['content']}</font><hr style='border:none;border-top:2px dotted #F8F8FF;'/>";
    }
?>
</div>
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

