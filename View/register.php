<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>My Tweet Academie</title>
	<link rel="stylesheet" type="text/css" href="View/tweet_style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Fascinate" rel="stylesheet">

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
				</ul>
			</div>
		</nav>

	<h1 id="title1">My Tweet Academie</h1>

	<nav class="navbar navbar-expand-lg navbar-light bg-light" id="navInscription">
		<a class="navbar-brand" href="#">Inscription</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" >
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Déjà inscrit ?
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="index.php?controller=connexion">Connexion</a>
					</div>
				</li>
			</ul>
		</div>
	</nav>

	<form method="post" class="form" id="form_accueil">
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="fullName">Nom et Prénom</label>
				<input type="text" class="form-control" id="fullName" name="fullName" placeholder="Nom et Prénom">
			</div>

			<div class="form-group col-md-6">
				<label for="displayName">Pseudo</label>
				<input type="text" class="form-control" id="displayName" name="displayName" placeholder="Pseudo">
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="mail">Email</label>
				<input type="mail" class="form-control" id="mail" placeholder="Email" name="mail">
			</div>
			<div class="form-group col-md-6">
				<label for="password">Password</label>
				<input type="password" class="form-control" id="password" placeholder="Password" name="password">
			</div>
		</div>
		<div class="form-row">
			<button type="submit" class="btn btn-primary" id="button">S'inscrire</button>
		</div>
	</form>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
</body>
</html>