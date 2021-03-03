<?php
header('Content-type: text/html; charset=UTF8');
include_once('header.php');
include_once("conn.php");
?>
<style>
a:hover{font-size:150%;text-decoration:underline}
</style>
<h2 style="text-align:center;margin-top:60px;text-shadow: 0 0 10px #87CEFA,0 0 10px #87CEFA,0 0 10px #87CEFA,0 0 20px #87CEFA; color:white;">Add A Message</h2>
<h4 style="text-align:center;text-shadow: 0 0 10px #87CEFA,0 0 10px #87CEFA,0 0 10px #87CEFA,0 0 20px #87CEFA; color:white;"><a href="messageinfo.php" style="color:white;">For record your reading experience.</a></h4>
<div style="margin:30px auto;height:315px;width:800px;background-color:rgba(135,206,250,0.2);">
<form action="" method="post">  
        <input type="text" class="form-control" style="padding-top:20px;" name="name" placeholder="please enter your name." /><br>
        <textarea class="form-control" style="height: 240px;" name="content" placeholder="please enter your message..."></textarea><br>
        <input type="submit" name="ok" value="提交" class="btn btn-primary" style="margin-left:320px;">
        <input type="reset" name="ok2" value = "重置" class="btn btn-info">
        <?php
        if(isset($_POST['ok'])){
            $name = $_POST['name'];
            $content = $_POST['content'];
            $nowTime = date('Y-m-d H:i:s',time());
            $insert = $db->insert("message",array("name"=>$name,"content"=>$content,"time"=>$nowTime));
            echo "<script>alert('留言成功')</script>";
            echo "<script>location='messageinfo.php'</script>";
        }
        if (isset($_POST['ok2'])){
            header("Location:message.php");
        }
?>
</form>
</div>
