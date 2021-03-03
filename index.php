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
  <h1 class="hogo"><i>Login Of Library</i></h1>
</div>
<section class="stark-login">
    <form action="" method="post">	
        <div id="fade-box">
            <input type="text" name="userid" pattern="\w{5}" placeholder="Please enter user ID">
            <input type="password" name="password" pattern="\w{6,10}" placeholder="Please enter user password">
            <input type="text" name="code" pattern="\w{5}" placeholder="Please enter Verification Code"  style="width:240px;display:inline;margin-bottom:20px;">
            <img src="code.php" alt="" onclick="this.src='code.php?id='+Math.random()" style="margin-left:10px;vertical-align:middle;margin-bottom:8px;"/>
            <button type="submit" name="ok1">Login</button>
            <button type="submit" name="ok2">Register</button>
            <?php
            include_once("conn.php");
            session_start();
            if(isset($_POST['ok1'])){
                $userid = empty($_POST['userid'])?'':trim($_POST['userid']);
                $password=empty($_POST['password'])?'':trim($_POST['password']);
                $code=empty($_POST['code'])?'':trim($_POST['code']);
                $session_code = empty($_SESSION['code'])?'':trim($_SESSION['code']);
                if(strtolower($code)===strtolower($session_code)){
                    $password = md5($password);
                    $select = $db->select("user","*",array("AND"=>array("id"=>$userid,"pwd"=>$password)));
                    if(empty($select['0']['id'])){
                        echo "<script>alert('账号或密码错误，请重新输入！')</script>";
                        echo "<script>location='index.php'</script>";
                    }else{
                        date_default_timezone_set('PRC');
                        $nowTime = date('Y-m-d H:i:s',time());
                        $update = $db->update("user",array("last_login_time"=>$nowTime),array("id[=]"=>$userid));
                        unset($_SESSION['code']);
                        session_start();
                        $_SESSION['id'] = $userid;
                        header('Location:user.php');
                    }
                }else{
                    echo "<script>alert('验证码不正确')</script>";
                    echo "<script>location='index.php'</script>";
                }
            }
            if(isset($_POST['ok2'])){
                header('Location:register.php');
            }
            ?>
        </div>
    </form>
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
