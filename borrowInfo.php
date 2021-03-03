<?php
include_once("header.php");
include_once("conn.php");
$userid = $_GET['user_id'];
$select1 = $db->select("borrow_list",array("[>]book_info"=>array("book_id"=>"id")),array("book_id","name","borrow_date","back_date"),array("AND"=>array("borrow_list.user_id"=>$userid)));
echo "<table border='0px #4169E1solid' width='600px' align='center' style='margin-top: 60px;' cellpadding='0' cellspacing='0' bgcolor=\"#87CEFA\">";
echo "<caption style='text-align:center;text-shadow: 0 0 10px #4682B4,0 0 10px #4682B4,0 0 10px #4682B4,0 0 20px #4682B4;margin-bottom:30px;'><h3 style='font-size:30px;color:white;'>User Borrowing Information</h3></caption>";
echo "<tr style='line-height: 40px;'><th style='text-align:center;background-color: rgb(81, 130, 187);color: #fff;'>Book ID</th><th style='text-align:center;background-color: rgb(81, 130, 187);color: #fff;'>Book Name</th><th style='text-align:center;background-color: rgb(81, 130, 187);color: #fff;'>Borrowing Time</th><th style='text-align:center;background-color: rgb(81, 130, 187);color: #fff;'>Return Time</th><th style='text-align:center;background-color: rgb(81, 130, 187);color: #fff;'>State</th></tr>";
$time = time();
$borrow_data = date("Y-m-d",$time);
$a = strtotime($borrow_data);
foreach ($select1 as $row){
        echo "<tr style='text-align: center;line-height: 40px;border:2px solid #4682B4'>";
        echo "<td style='border:0px;'>".$row['book_id']."</td>";
        echo "<td style='border:0px;'>".$row['name']."</td>";
        echo "<td style='border:0px;'>".$row['borrow_date']."</td>";
        echo "<td style='border:0px;'>".$row['back_date']."</td>";
        $b = strtotime($row['back_date']);
        if($a<=$b){
            echo "<td style='border:0px;'><span style='color: #5cb85c'>正常</span></td>";
        }else{
            echo "<td style='border:0px;'><a href='borrow.php' style='color: #d43f3a;text-decoration: none;'>逾期</a></td>";
        }
        echo "</tr>";
}
echo "</table>"
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