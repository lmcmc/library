<?php
include_once('header.php');
include_once("conn.php");
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Library Management System</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src='js/prefixfree.min.js'></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript">
        function F_Open_dialog() 
        { 
        document.getElementById("btn_file").click(); 
        }
</script>
</head>
<body>
<div id="home_Register">
    <?php
    $file = "uploads/".$id.".png";
    //var_dump(file_exists($file));
    if(file_exists($file)){
        $avatar = $file;
    }else{
        $avatar ="uploads/default.png";
    }
    ?>
    <form action='upload.php' method="post" enctype="multipart/form-data">
    <img src='<?php echo $avatar;?>' class="round_icon"  onclick='F_Open_dialog()' alt="">
    <input type="submit"  value="Change Avatar" style='margin-left:676px;font-size:10px;border-radius:15px;'>
    <input type="file" name='file' id="btn_file" style="opacity: 0;margin-left:676px;">
    </form>
    <?php
    echo "<p>User ID: {$select['0']['id']}</p>";
    echo "<p>User Name: {$select['0']['name']}</p>";
    echo "<p>User Class: {$select['0']['class']}</p>";
    if($select['0']['status']==1){
        echo "<p>User status: Normal</p>";
    }else{
        echo "<p>User status: Abnormal</p>";
    }

    $select1 = $db->select("borrow_list",array("[>]book_info"=>array("book_id"=>"id")),array("book_id","name","borrow_date","back_date"),array("AND"=>array("borrow_list.user_id"=>$id)));
    $time = time();
    $borrow_data = date("Y-m-d",$time);
    $a = strtotime($borrow_data);
    echo "<table class='table'>";
    echo "<caption style='text-align:center;color:black'><h2>Personal borrowing details</h2></caption>";
    echo "<thead><tr><th>Book ID</th><th>Book Name</th><th>Borrowing Time</th><th>Return Time</th><th>State</th></tr></thead>";
    foreach ($select1 as $row){
            echo "<tr class=\"info\">";
            echo "<td>".$row['book_id']."</td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['borrow_date']."</td>";
            echo "<td>".$row['back_date']."</td>";
            $b = strtotime($row['back_date']);
            if($a<=$b){
                echo "<td><span style='color: #3CB371'>正常</span></td>";
            }else{
                echo "<td><a href='borrow.php' style='color: #DC143C;text-decoration: none;'>逾期</a></td>";
            }
            echo "</tr>";
    }
    echo "<tr class=\"info\"><td colspan=\"5\" style=\"text-align:center\">No borrowing information...</td></tr>"; 
    echo "</table>"
    ?>
</div>
</body>
</html>

