<?php

header("content-type:text/html;charset=utf-8");
/*
echo "<pre>";
print_r($_FILES);
echo "</pre>";
*/	
session_start();
$userid = $_SESSION['id'];
$tmpfile=empty($_FILES['file']['tmp_name'])?'':$_FILES['file']['tmp_name'];
$fname=empty($_FILES['file']['name'])?'':$_FILES['file']['name'];
$ext=explode('.',$fname);
$fileext=array_pop($ext);
$ftype=empty($_FILES['file']['type'])?'':$_FILES['file']['type'];
$type=explode('/',$ftype);
$filetype=array_shift($type);
$ext_arr = array('png');

if(!empty($_FILES)){
	if(in_array($fileext,$ext_arr)){
		$detfile='uploads/'.$userid.'.'.$fileext;
		if(move_uploaded_file($tmpfile,$detfile))
		{
			echo "<script>alert('上传成功');location.href='user.php'</script>";
		}
		else{
			echo "<script>alert('上传失败');location.href='user.php'</script>";
		}
	}else{
		echo "<script>alert('请上传PNG图片');location.href='user.php'</script>";
	}
}else{
	echo "<script>alert('请上传图片');location.href='user.php'</script>";
}

?>