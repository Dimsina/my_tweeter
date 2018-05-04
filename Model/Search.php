<?php
require_once("Tweet.php");

class Search extends User
{
	public function search_member($post)
	{
		if (isset($post))
		{
			$substr = substr($post, 1);
			$this->query("SELECT displayName FROM user WHERE displayName = '".$substr."'");
			$displayName = $this->fetch();

			if ($displayName != null)
			{
				return $displayName;
			}

		} 
		
	}
}

