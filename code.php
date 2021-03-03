<?php 
	header("content-type:image/png");

	require "vendor/autoload.php";

	use Gregwar\Captcha\CaptchaBuilder;

	$builder = new CaptchaBuilder;

	$builder->build();

	session_start();

	$_SESSION['code'] = $builder->getPhrase();

	$builder->output();

 ?>