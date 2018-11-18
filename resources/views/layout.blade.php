<?php 
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE HTML>
<html>
	<head>
	    <title>@yield('title', 'Invoice Manager')</title>
	    <link rel="stylesheet" type="text/css" href="public/assets/css/bootstrap.min.css">
	    <link rel="stylesheet" type="text/css" href="public/assets/css/style.css">
	</head>

	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="./dashboard">Invoice Manager</a>
			</div>

			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav navbar-right">
					<li role="presentation" class="dashboard"><a href="/">Home</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<body>
		<div class="container">

			@yield('content')

		</div><!-- end container -->
		<script src="public/assets/js/jquery.min.js"></script>
	    <script src="public/assets/js/bootstrap.min.js"></script>
	    <script src="public/assets/js/script.js"></script>
	</body>
</html>