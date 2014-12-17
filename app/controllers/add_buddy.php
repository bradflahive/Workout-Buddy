<?php

// Controller
class Controller extends AjaxController {
	protected function init() {

		$input = [];
		$input['name'] = $_POST['name'];

	}

}
$controller = new Controller();