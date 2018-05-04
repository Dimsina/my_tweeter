<?php

require_once ("User.php");

class Tweet extends DB {
	
	public function addTweet($tweetContent, $idUser){
		$this->query("INSERT INTO tweet(idUser, tweetContent) VALUES(:idUser, :tweetContent)");
		$this->bind(':tweetContent', $tweetContent);
		$this->bind(':idUser', $idUser);
		$this->execute();
		return true;
	}

	public function getTweets(){
		$this->query("SELECT tweet.idReTweet AS idReTweet,tweet.idTweet AS idTweet ,tweet.tweetContent AS tweetContent, tweet.tweetDate AS tweetDate, user.fullName AS userFullName, user.displayName AS userDisplayName
			FROM tweet
			LEFT JOIN user ON tweet.idUser = user.idUser
			WHERE deleted = 'true'
			ORDER BY tweet.tweetDate DESC");
		$this->execute();
		$tweets = $this->fetch_all();
		return $tweets;
	}

	public function getReTweets(){
		$this->query("SELECT tweet.idReTweet AS idReTweet, tweet.idTweet AS idTweet ,tweet.tweetContent AS tweetContent, tweet.tweetDate AS tweetDate, user.fullName AS userFullName, user.displayName AS userDisplayName
			FROM tweet
			LEFT JOIN user ON tweet.idUser = user.idUser
			WHERE deleted = 'true' AND idReTweet IS NOT NULL
			ORDER BY tweet.tweetDate DESC");
		$this->execute();
		$retweets = $this->fetch_all();
		// var_dump($retweets);
		return $retweets;
	}

	public function getTweetFromReTweet($idTweet){
		$this->query("SELECT tweet.idReTweet AS idReTweet,tweet.idTweet AS idTweet ,tweet.tweetContent AS tweetContent, tweet.tweetDate AS tweetDate, user.fullName AS userFullName, user.displayName AS userDisplayName
			FROM tweet
			LEFT JOIN user ON tweet.idUser = user.idUser
			WHERE deleted = 'true' AND tweet.idTweet = :idTweet
			ORDER BY tweet.tweetDate DESC");
		$this->bind(':idTweet', $idTweet);
		$this->execute();
		$original_tweet = $this->fetch();
		return $original_tweet;
	}

	public function getUserIdFromTweet($idTweet){
		$this->query("SELECT idUser FROM tweet WHERE idTweet = :idTweet");
		$this->bind(':idTweet', $idTweet);
		$this->execute();
		$result = $this->fetch();
		return $result['idUser'];
	}

	public function addReTweet($idNewUser, $idTweet, $tweetContent = NULL){
		$idReTweetFrom = $this->getUserIdFromTweet($idTweet);
		$this->query("INSERT INTO tweet(idUser, tweetContent, idReTweet, idReTweetFrom) 
					  VALUES(:idUser, :tweetContent, :idReTweet, :idReTweetFrom)");
		$this->bind(':tweetContent', $tweetContent); //message rajouté sur le retweet (facultatif)
		$this->bind(':idReTweet', $idTweet); //id du tweet originel
		$this->bind(':idReTweetFrom', $idReTweetFrom); //id de la personne qui avait tweeté au départ
		$this->bind(':idUser', $idNewUser); //id du user qui a retweeté
		$this->execute();
		return true;
	}
}