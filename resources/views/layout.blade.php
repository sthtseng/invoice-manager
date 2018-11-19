<?php 
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>@yield('title', 'Invoice Manager')</title>
		<link rel="stylesheet" type="text/css" href="/css/app.css">
	</head>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="/">Invoice Manager</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item"><a class="nav-link" href="/">Home</a></li>
				<li class="nav-item"><a class="nav-link" href="/invoices/create">Create Invoice</a></li>
			</ul>
		</div>
	</nav>

	<body>
		<div class="container" style='margin-top:20px'>

			@yield('content')

		</div>

		<script src="/js/app.js"></script>
	</body>
</html>