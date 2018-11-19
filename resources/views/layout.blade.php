<?php 
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>@yield('title', 'Invoice Manager')</title>
		<link rel="stylesheet" type="text/css" href="/css/app.css">
	</head>

	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/">Invoice Manager</a>
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

		</div>

		<script src="/js/app.js"></script>
	</body>
</html>