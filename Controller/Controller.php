<?php

class Controller {
	
	protected function view($view, $param = []){
		extract($param);
		include("View/".$view.".php");
	}

	public function clean($data){
		return htmlspecialchars(strip_tags(trim($data)));
	}
}