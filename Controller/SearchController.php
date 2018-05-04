<?php
require_once("Model/Search.php");
/*recherche par @*/
if (isset($_POST))
{
	if (isset($_POST['search']))
	{
		if ($_POST['search'][0] !== '@')
		{
			echo "La recherche doit être par pseudo valide.";
		}
		else
		{
			$displayN = new Search();
			$displayName = $displayN->search_member($_POST['search']);
			header("Location: index.php?controller=profile&displayname=".$displayName['displayName']);
		}
	}
}