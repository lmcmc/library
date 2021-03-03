<script src="js/universe.js"></script>
<?php
include_once("conn.php");
include_once('header.php');
$bookid = empty($_GET['book_id'])?'':trim($_GET['book_id']);
$select1 = $db->select("book_info","*",array("AND"=>array("id"=>$bookid)));
$select2 = $db->select("borrow_list","*",array("AND"=>array("book_id"=>$bookid)));
?>
<div id="book_detiail">
    <h4 style="text-align:center;">Book details</h4>
    <?php
        foreach ($select1 as $row){
            echo "<h5>Book Name：".$row['name']."</h5>";
            echo "<h5>Author：".$row['author']."</h5>";
            echo "<h5>Publisher：".$row['press']."</h5>";
            echo "<h5>Publication time：".$row['press_time']."</h5>";
            echo "<h5>Price：".$row['price']."</h5>";
            echo "<h5>ISBN：".$row['ISBN']."</h5>";
            echo "Introduction：".$row['name']."</br>";
            echo "<p>".$row['desc']."</p>";
        }
        foreach ($select2 as $row){
            echo "<table class=\"table\">";
            echo "<tr>";
            echo "<th>User ID</th>";
            echo "<th>Return Time</th>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>{$row['user_id']}</td>";
            echo "<td>{$row['back_date']}</td>";
            echo "</tr>";
            echo "</table>";
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







