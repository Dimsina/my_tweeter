<!DOCTYPE html>
<html>
<head>
	<title>My tweet academie</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="View/home_style.css">
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
                    <a class="nav-link" href="index.php?controller=home">My Tweet Academie <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Accueil</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="index.php?controller=home" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Menu
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="index.php?controller=profile">Profil</a>
                        <a class="dropdown-item" href="index.php?controller=privateConversation">Messagerie</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="index.php?controller=profile">Déconnexion</a>
                    </div>
                </li>
                
            </ul>
            <form class="form-inline my-2 my-lg-0" method="POST">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
                <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
	
	<h1 id="title1" class="row">My Tweet Academie</h1>
	<h2 id="title2" class="row">Fil d'actualité</h2>
	<div class="container col-sm-8" id="test">
		
		<form method="POST" id="formTweets">
			<div class="form-row">	
				<div class="form-group col-md-6" id="col18">
					<textarea class="form-control" id="tweet" name="tweet" required="" placeholder="Plait-il ? Un tweet ? Oui c'est ici ! ... "></textarea>
				</div>
			
				<div class="form-group col-md-3">
					<button id="singlebutton" name="singlebutton" type="submit" class="btn btn-primary">Tweetez !</button>
				</div>
			</div>
		</form>
		<div id="div-tweets">
			<?php $i = 0; 
					foreach ($tweets as $tweet) {?>
			<div class="tweet">
					<?php if (isset($tweets[$i]['idReTweet']) && isset($retweets[$i]['idTweet']) && $tweets[$i]['idReTweet'] != NULL) { ?>
							<div class="headerReTweet">
								<img src="View/images/retweet_icon.png" id="retweet_icon_head" width="15px" height="15px" alt="retweet icon">
								<p><?php echo $retweets[$i]['userFullName']; ?> a retweeté !<p>
								<div class="clear"></div>
								<div class="headerTweet">
								<span class="userNames"><?php echo $original_tweet[$i]['userFullName']; ?></span>
								<span class="displayName">@<?php echo $original_tweet[$i]['userDisplayName']; ?></span>
								<span class="tweetDate">&middot; <?php echo $original_tweet[$i]['tweetDate']; ?></span>
								</div>
							</div>
							<p class="tweetContent"><?php echo $original_tweet[$i]['tweetContent']; ?></p>
							<div class="footerTweet">
								<form method="POST">
									<input type="hidden" name="comment" value=<?php echo "\"".$tweets[$i]['idTweet']."\"" ?>>
									<button id="comment-button" type="submit" class="button-tweet"><img src="View/images/comment_icon.png" width="20px" height="20px" alt="comment icon"></button>

									<input type="hidden" name="retweet" value=<?php echo "\"".$tweets[$i]['idTweet']."\"" ?>>
									<button id="retweet-button" onclick="retweetContent()" type="submit" class="button-tweet"><img src="View/images/retweet_icon.png" width="20px" height="20px" alt="retweet icon"></button>

									<input type="hidden" name="like" value=<?php echo "\"".$tweets[$i]['idTweet']."\"" ?>>
									<button id="like-button" type="submit" class="button-tweet"><img src="View/images/like_icon.png" width="15px" height="15px" alt="like icon"></button>
									<img src="View/images/delete_icon.png" id="delete_icon" width="15px" height="15px" alt="delete icon">
								</form>
							</div>
							<p><?php echo $tweets[$i]['tweetContent']; ?></p>
						<?php }else{ ?>
							<div class="headerTweet">
								<span class="userNames"><?php echo $tweets[$i]['userFullName']; ?></span>
								<span class="displayName">@<?php echo $tweets[$i]['userDisplayName']; ?></span>
								<span class="tweetDate">&middot; <?php echo $tweets[$i]['tweetDate']; ?></span>
							</div>
							<p class="tweetContent"><?php echo $tweets[$i]['tweetContent']; ?></p>
							<div class="footerTweet">
								<form method="POST">
									<input type="hidden" name="comment" value=<?php echo "\"".$tweets[$i]['idTweet']."\""; ?>>
									<button id="comment-button" type="submit" class="button-tweet"><img src="View/images/comment_icon.png" width="20px" height="20px" alt="comment icon"></button>

									<input type="hidden" name="retweet" value=<?php echo "\"".$tweets[$i]['idTweet']."\""; ?>>
									<button id="retweet-button" onclick="retweetContent()" type="submit" class="button-tweet"><img src="View/images/retweet_icon.png" width="20px" height="20px" alt="retweet icon"></button>

									<input type="hidden" name="like" value=<?php echo "\"".$tweets[$i]['idTweet']."\""; ?>>
									<button id="like-button" type="submit" class="button-tweet"><img src="View/images/like_icon.png" width="15px" height="15px" alt="like icon"></button>
									<img src="View/images/delete_icon.png" id="delete_icon" width="15px" height="15px" alt="delete icon">
								</form>
							</div>
						<?php } ?>
					
			</div>
			<?php $i++; }?>
			
		</div>
	</div>
	<footer>

	</footer>
	<script src="View/script/tweet_script.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
</body>
</html>