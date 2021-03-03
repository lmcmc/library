<?php
include_once("conn.php");
session_start();
@$id = $_SESSION['id'];
if(empty($id)){
    echo "<script>alert('请先登录！')</script>";
    echo "<script>location='index.php'</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Library Management System</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src='js/prefixfree.min.js'></script>
    <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
    <script src="js/JQ.js"></script>
    <canvas class="fireworks" style="position:fixed;left:0;top:0;z-index:99999999;pointer-events:none;"> </canvas>
    <script type="text/javascript" src="js/fireworks/anime.min.js"></script>
    <script type="text/javascript" src="js/fireworks/fireworks.js"></script>

    
</head>
<body>
<div id="header">
    <h1>Library Management System</h1>
    <ul>
        <a href="user.php"><li>User</li></a>
        <a href="book.php"><li>Book</li></a>
        <a href="borrow.php"><li>Borrow</li></a>
        <?php
        $select = $db->select("user","*",array("id"=>$id));
        if($select['0']['admin']==1){
            echo "<a href=\"admin.php\"><li>Admin</li></a>";
        }else{
                echo "<a href=\"message.php\"><li>Message</li></a>";
        }
        ?>
        <a href="quit.php"><li>Log out</li></a>
    </ul>
</div>
</body>
</html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Live2D</title>

<link rel="stylesheet" type="text/css" href="http://127.0.0.1/ABC/Library/assets/flat-ui.min.css"/>
<link rel="stylesheet" type="text/css" href="http://127.0.0.1/ABC/Library/assets/waifu.css"/>
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div class="waifu" id="waifu">
<div class="waifu-tips" style="opacity: 1;"></div>
<canvas id="live2d" width="280" height="250" class="live2d"></canvas>
<div class="waifu-tool">
<span class="fui-home"></span>
<span class="fui-chat"></span>
<span class="fui-eye"></span>
<span class="fui-user"></span>
<span class="fui-photo"></span>
<span class="fui-info-circle"></span>
<span class="fui-cross"></span>
</div>
</div>
<script src="http://127.0.0.1/ABC/Library/assets/live2d.min.js"></script>
<script src="http://127.0.0.1/ABC/Library/assets/waifu-tips.js"></script>
<script type="text/javascript">initModel()</script>
</body>
</html>