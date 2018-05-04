<!DOCTYPE html>
<html lang="en">

<head>
  <title>My tweet academie</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="View/tweet_style.css" media="screen">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

</head>

<body id="body-background">

  <!-- Coco's Navbar -->

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
      <form class="form-inline my-2 my-lg-0" method="post">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search" aria-label="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>
  <!-- Start 'Profil' -->
  <div>
    <img class="banner" src="View/images/crane.jpg" alt="Bannière du profil">
  </div>
  <article id="left">
    <div class="card">
      <img class="card-img-top" id="imgProfil" src="View/images/care_bears.jpg" alt="Image du profil">
      <div class="card-body">
        <h5 class="card-title">Mes Informations</h5>
        <p class="card-text"><?php echo $fullName; ?></p>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">@<?php echo $displayName; ?></li>
        <li class="list-group-item">Membre depuis le <?php echo $registrationDate; ?></li>
        <li class="list-group-item"><?php echo $mail; ?></li>
      </ul>
      <div class="card-body">
        <div class="dropdown" id="optionCompte">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Options de compte
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item">
              <form method="POST" action="upload.php" enctype="multipart/form-data">
                <input type="file" name="avatar">
              </form>
              <button type="submit" name="upload">Envoyer</button>
            </a>
            <div class="dropdown-divider"></div>
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Modifier Thème
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="#" value="">Couleur de fond</a>
              <a class="dropdown-item" href="#" value="red">Red</a>
              <a class="dropdown-item" href="#" value="pink">Pink</a>
            </div>
          </div>
        </div>

        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="showForms()">Modifier les informations</button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

            <a class="dropdown-item">
              <form method="POST" id="emailForm" action="">
                <label><b>Modifier Email</b></label><br>
                <input type="text" placeholder="email" name="updatemail">
                <button type="submit" name="submit" value="apdatemail" class="signupbtn">Modifier</button>
              </form>
            </a>
            <a class="dropdown-item">
              <form method="POST" id="passForm" action="">
                <label><b>Modifiez votre Mot De Passe</b></label><br>
                <input type="password" placeholder="ancien mot de passe" name="pswmodif"><br>
                <input type="password" placeholder="nouveau mot de passe" name="pswmodif"><br>
                <input type="password" placeholder="nouveau mot de passe" name="pswmodif"><br>
                <button type="submit" name="submit" value="psw" class="signupbtn">Modifier</button>
              </form>
            </a>
          </div>
        </div>
      </div>
    </div>
  </article>
      <!-- Start 'Fil d'actualité' -->
  <div class="container" id="right">
    <h1 id="title1Profil">My Tweet Academie</h1>
    <h2 id="title2Profil">Fil d'actualité</h2>
    <div class="container col-sm-8" id="testProfil1">

      <form method="POST" id="formTweets">
        <div class="form-row">
    
          <div class="form-group col-md-18" id="col18">
            <textarea class="form-control" id="tweet" name="tweet" required="" placeholder="Plait-il ?Un tweet? oui c'est ici! ... "></textarea>
          </div>

          <div class="form-group col-md-6">
            <button id="singlebutton" name="singlebutton" type="submit" class="btn btn-primary">Tweetez !</button>
          </div>
        </div>
      </form>
      <div id="div-tweets">
        <div class="col">
          <li class="tweet">
            <ul class="row">
              <div class="headerTweet">
                <li class="userNames">Darla Drusilla <span class="displayName"> @Drusilla</span>
                  <span class="tweetDate">12/12/2012</span>
                </li>
              </div>
              <p class="tweetContent">Message quelconque qui sert de tweets</p>
            </ul>

          </li>
          <div class="glyphicons">
          </div>
          <div class="w-100"></div>
          <li class="tweet">
            <ul>
              <li class="userNames">Darla Drusilla<span class="displayName"> Drusilla</span></li>
              <li class="tweetDate">12/12/2012</li>
              <li class="tweetContent">Message quelconque qui sert de tweets</li>

            </ul>
          </li>
        </div>

      </div>
    </div>
  </div>
  </div>
  <script type="text/javascript" src="View/script/tweet_script.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
</body>

</html>