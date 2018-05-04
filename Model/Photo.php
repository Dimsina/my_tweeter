<?php
require_once("User.php");

/**
* 
*/
class Images extends User
{
	
	public function add_image($post)
	{

		$this->query("UPDATE user SET avatar = :avatar WHERE mail = :mail");
		$this->bind(':mail', $post['mail']);
		$this->bind(':avatar', $post['avatar']);
		$this->execute();

	}
}