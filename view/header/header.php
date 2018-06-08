<!DOCTYPE html>
<html>
	<head>
	    <meta charset="utf-8">
	    <title><?php if(isset($title)){ echo $title; }?></title>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" media="screen" href="css/bootstrap.min.css">
		<link rel="stylesheet" media="screen" href="css/font-awesome.min.css">
		<link rel="stylesheet" media="screen" href="css/myself.css">

    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.3/sweetalert2.css" />
	</head>
	
	<body>
		<?php 
			// 載入導覽列
			include('view/header/header_menu.php'); 
		?>

		<!-- body 中間 -->
		<main role="main">
		