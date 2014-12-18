<?php

// Controller
class Controller extends AjaxController {
	protected function init() {

		$user = new User(UserLogin::getUserID());
		
		$_POST['user_id'] = $user->user_id;

		$input = [];
		$input['user_id'] = $_POST['user_id'];
    	$input['activity_id'] = $_POST['activity'];
    	$input['location_id'] = $_POST['location'];
    	$input['time'] = $_POST['time'];
    	$input['day'] = $_POST['day'];
    	$input['intensity'] = $_POST['intensity'];
    	$input['name'] = $_POST['name'];

		// print_r($_POST);

		$sql = "
			UPDATE user_activity_location
			SET invitee_name = '{$input['name']}'
			WHERE activity_id = '{$input['activity_id']}'
			AND location_id = '{$input['location_id']}'
			AND day = '{$input['day']}'
			AND time = '{$input['time']}'
			AND intensity = '{$input['intensity']}'
			AND user_id = '{$input['user_id']}'
			";

		$results = db::execute($sql);

	}

}
$controller = new Controller();