<?php
include_once('header.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Library Management System</title>
    <link href="style/style.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<h2 style="text-align:center;margin-top:120px;text-shadow: 0 0 10px #87CEFA,0 0 10px #87CEFA,0 0 10px #87CEFA,0 0 20px #87CEFA; color:white;">Borrowing Management</h2>
<div id="Borrow_Register">
    <form action="" method="post">
        <input type="text" name="userid" placeholder="Please enter user ID"><br><br>
        <input type="text" name="bookid" placeholder="Please enter book ID"><br><br>
        <h5 id="borrowMan"><input type="radio" name="operation" value="0" checked>Borrow&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="operation" value="1">Return</h5>
        <button type="submit" name="ok" class="btn btn-info">Submit</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="submit" name="ok2" class="btn btn-info">Reset</button>
        <?php
        include_once("conn.php");
        $id = $_SESSION['id'];
        if(isset($_POST['ok'])){
            $num = $_POST['operation'];
            $userid = $_POST['userid'];
            $bookid = $_POST['bookid'];
            if($id === $userid){
                if($num==0){//借书操作
                    $time = time();
                    $borrow_data = date("Y-m-d",$time);
                    $back_data = date("Y-m-d",strtotime("+3 month"));
                    $insert = $db->insert("borrow_list",["book_id"=>$bookid,"user_id"=>$userid,"borrow_date"=>$borrow_data,"back_date"=>$back_data]);
                    if($insert){header("Location:borrowInfo.php?user_id=$userid");}
                }else{//还书操作
                    $delete = $db->delete("borrow_list",array("AND"=>array("book_id"=>$bookid,"user_id"=>$userid)));
                    if($delete){header("Location:borrowInfo.php?user_id=$userid");}
                }
            }else{
                echo "<script>alert('Wrong user ID！')</script>";
                echo "<script>location='borrow.php'</script>";
            }
        }
        if (isset($_POST['ok2'])){
        header("Location:borrow.php");
    }
?>
    </form>
    <div id="circle1">
    <div id="inner-cirlce1">
        <h2> </h2>
    </div>
    </div>
</div>
</body>

