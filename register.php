<?php
include_once("conn.php");
session_start();
?>
<!doctype html>
<html lang="zh">
<head>
<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Library Management System</title>
    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="css/default.css">
	<script src='js/prefixfree.min.js'></script>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
    <canvas class="fireworks" style="position:fixed;left:0;top:0;z-index:99999999;pointer-events:none;"> </canvas>
    <script type="text/javascript" src="js/fireworks/anime.min.js"></script>
    <script type="text/javascript" src="js/fireworks/fireworks.js"></script>
</head>
<body>
<div id="logo"> 
  <h1 class="hogo"><i>Register Of Library</i></h1>
</div>
<section class="stark-login1" id="register">
    <form action="" method="post">	
        <div id="fade-box">
            <input  type="text" name="userid" placeholder="Please enter user ID">
            <input type="text" name="class" placeholder="Please enter user class">
            <input type="text" name="name" placeholder="Please enter username">
            <input type="password" name="password" placeholder="Please enter user password">
            <button type="submit" name="ok1">Submit</button>
            <button type="submit" name="ok2">Reset</button>
            <?php
            if(isset($_POST['ok1'])){
                $userid = empty($_POST['userid'])?'':trim($_POST['userid']);
                $class = empty($_POST['class'])?'':trim($_POST['class']);
                $name = empty($_POST['name'])?'':trim($_POST['name']);
                $password = empty($_POST['password'])?'':trim($_POST['password']);
                $time = date('Y-m-d h:i:s', time());
                //$arr = array();
                $select = $db->select("user","*",array("id"=>$userid));
                if($select){
                    echo "<script>alert('账号已存在，请重新输入账号！')</script>";
                }else{
                    $password = md5($password);
                    $insert = $db->insert("user",array("id"=>$userid,"pwd"=>$password,"name"=>$name,"class"=>$class));
                    if($insert){
                        header('Location:index.php');
                    }else{
                        echo "<script>alert('注册信息错误，请重新输入！')</script>";
                    }
                }
            }
            ?>
        </div>
    </form>
    <button style="border:1px solid #F5FFFA;margin:30px auto;"><a href="index.php">Return</a></button>
    <div class="hexagons">
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <br>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <br>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span> 
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
            
        <br>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <br>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
        <span>&#x2B22;</span>
    </div>      
</section> 
    
<div id="circle1">
    <div id="inner-cirlce1">
        <h2> </h2>
    </div>
</div>
</body>
