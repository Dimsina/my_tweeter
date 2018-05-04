<?php include_once "./Controller/PrivateConversationController.php";  ?>
<!DOCTYPE html>
<html>
<head> 
	<title>Messagerie Instantannée</title>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./View/tweet_style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">


</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light" id="navBarColor">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="#">My Tweet Academie <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="index.php?controller=home">Accueil</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Menu
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="#">Profil</a>
						<a class="dropdown-item" href="#">Messagerie</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">
							<form action="" method="post">
								<input class="dropdown-item" type="submit" name="logout" value="Déconnexion"/>
							</form>
						</a>
					</div>
				</li>
			</ul>
		</div>
				<form class="form-inline my-2 my-lg-0">
					<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
				</form>
	</nav>
	<div class="container" id="con-msg">
		<div class="row">
			<div class="col">	
				<div class="container-Messages">
					<div class="row">
						<div class="col-12 col-md-6">
							<form method="POST">
								<select class="custom-select" id="sel-msg" name="destinataire">
									<option>Nom des personnes</option>
									<?php
									$displayN-> pseudo();

									?> 
								</select>
								<br><br>
								<textarea id="text-msg" placeholder="Votre message" name="message"></textarea><br>
								<input type="submit" id="but-msg" class="btn btn-outline-dark" value="Envoyer" name="send_mess">
								<br><br>
								<?php
								if (isset($error)) {
									echo $error;
								}
								?>
							</form>
						</div>
					</div>

					<div class="row">
						<div class="col">
							<table class="table table-bordered">
								<thead class="thead-light">
									<tr>
										<th>Envoyé par:</th>
										<th>Envoyé à:</th>
										<th>Heure</th>
										<th>Contenu</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$displayN->seemessage($_SESSION['idUser']);
									?>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
</body>
</html>