<!DOCTYPE html>
<html>
	<head>
		<title>My tweet academie</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="views/style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="View/script/script.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<header>
			<nav class="navbar navbar-inverse">
				<div class="container-fluid">
					<div class="navbar-header">
						<a class="navbar-brand" href="#" id="logo">My Tweet Academie</a>
					</div>
					<ul class="nav navbar-nav navbar-right" id="nav-list">
						<li><a class="subtitle" href="index.php?controller=search">Recherche</a></li>
						<li class="parent-sub-menu"><span class="subtitle">Mon compte</span>
							<?php echo $sub_menu; ?>
						</li>
					</ul>
				</div>
			</nav>
		</header>
<?php
echo $content;
?>
</body>
</html>