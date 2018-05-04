<?php
require_once('Controller/Controller.php');
require_once('Model/Tweet.php');
require_once('Model/Search.php');

$tweet = new Tweet();

class HomeController extends Controller {

	public function index($tweets, $retweets){
		return $this->view('home', [
			'tweets' => $tweets,
			'retweets' => $retweets,
			/*'original_tweet' => $original_tweet,*/
			'fullName' => $_SESSION['fullName'],
			'displayName' => $_SESSION['displayName'],
			'mail' => $_SESSION['mail'],
			'theme' => $_SESSION['theme'],
			'registrationDate' => $_SESSION['registrationDate'],
		]);
	}

	public function checkTweet($tweetContent){
		if (strlen($tweetContent) > 140) {
			echo "Les tweets ne doivent pas dépasser 140 caractères";
			return false;
		}else{
			return true;
		}
	}

	public function addTweet($tweet, $tweetContent, $idUser, $retweets/*, $original_tweet*/){
		if ($this->checkTweet($tweetContent)) {
			if ($tweet->addTweet($tweetContent, $idUser)) {
				$tweets = $tweet->getTweets();
				$this->index($tweets, $retweets/*, $original_tweet*/);
			}
		}
	}
	
}

$tweets = $tweet->getTweets();
$retweets = $tweet->getReTweets();
/*
$i = 0;
foreach ($retweets as $key => $value) {
	$original_tweet[$i] = $tweet->getTweetFromReTweet($retweets[$i]['idReTweet']);
	$i++;
}
*/
$home = new HomeController();


if(isset($_POST['tweet'])) {
	$idUser = $_SESSION['idUser'];
	$tweetContent = $home->clean($_POST['tweet']);
	$home->addTweet($tweet, $tweetContent, $idUser, $retweets, $original_tweet);
}elseif (isset($_POST['retweet'])) {
	$tweet->addReTweet($_SESSION['idUser'], $_POST['retweet']);
	$home->index($tweets, $retweets, $original_tweet);
}else{
	$home->index($tweets, $retweets);
}

// header("Content-Type: text/plain"); // Utilisation d'un header pour spécifier le type de contenu de la page. Ici, il s'agit juste de texte brut (text/plain). 

// $ReTweetContent = (isset($_POST["ReTweetContent"])) ? $_POST["ReTweetContent"] : NULL;

// if ($ReTweetContent) {
// 	// Faire quelque chose...
// 	echo "OK";
// } else {
// 	echo "FAIL";
// }
