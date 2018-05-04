<?php
require_once ("User.php");

class Profile extends DB {
	public function updatemail($updatemail, $mail){
		$this->query('UPDATE user SET mail= :updatemail WHERE mail = :mail');
    	$this->bind(':mail', $mail);
    	$this->bind(':updatemail', $updatemail);
		$this->execute();
	}
	public function checkmail($updatemail){
		$this->query("SELECT COUNT(mail) AS nb_mail FROM user WHERE mail = :updatemail");
		$this->bind(':updatemail', $updatemail);
		$this->execute();
		$result = $this->fetch();
		if ($result['nb_mail'] != '0')
		{
			echo "Email déjà enregistré! Veuillez en choisir un autre ";
			return false;
		}else{
			return true;
		}
	}
	public function updatepassword($updatepassword, $mail){
		$this->query('UPDATE user SET password = :updatepassword WHERE mail = :mail');
    	$this->bind(':updatepassword', $updatepassword);
    	$this->bind(':mail', $mail);
		$this->execute();
	}
	// public function addAvatar($avatar, $mail){
	// 	$this->query("UPDATE user SET idUrlAvatar = :avatar WHERE mail = :mail");
 //    	$this->bind(':idUrlAvatar', $avatar);
 //    	$this->bind(':mail', $mail);
	// 	$this->execute();
	// }
}
?>