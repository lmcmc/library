<?php
include_once('header.php');
include_once("conn.php");
$userid = empty($_GET['user_id'])?'':trim($_GET['user_id']);
$select1 = $db->select("user","*",array("AND"=>array("id"=>$userid)));
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
<h2 style="text-align:center;margin-top:120px;text-shadow: 0 0 10px #87CEFA,0 0 10px #87CEFA,0 0 10px #87CEFA,0 0 20px #87CEFA; color:white;">User Modification</h2>
<div id="Borrow_Register">
    <form action="" method="post">
        <input type="text" name="name" value="<?php echo $select1['0']['name']; ?>"><br><br>
        <input type="text" name="class" value="<?php echo $select1['0']['class']; ?>"><br><br>
        <button type="submit" name="ok" class="btn btn-info">Submit</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="submit" name="ok2" class="btn btn-info">Reset</button>
        <?php
        if(isset($_POST['ok'])){
            $newName = $_POST['name'];
            $newClass = $_POST['class'];
            $update = $db->update("user",array("class"=>$newClass,"name"=>$newName),array("id[=]"=>$userid));
            echo"<script>alert('修改成功！')</script>";
            echo "<script>location='admin.php'</script>";            
        }
        if (isset($_POST['ok2'])){
            header("Location:alteruser.php");
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

