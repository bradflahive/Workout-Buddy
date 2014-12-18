<?php

// Controller
class Controller extends AjaxController {
	protected function init() {

//--------------------------------------------------------
// Save form data to POST array & insert into DB

		$user = new User(UserLogin::getUserID());
		
		$_POST['user_id'] = $user->user_id;
		
		$input = [];
		$input['user_id'] = $_POST['user_id'];
    	$input['activity_id'] = $_POST['activity'];
    	$input['location_id'] = $_POST['location'];
    	$input['time'] = $_POST['time'];
    	$input['day'] = $_POST['day'];
    	$input['intensity'] = $_POST['intensity'];

    	$user_activity_location = new UserActivityLocation($input);

    	if($_POST['intensity'] != $input['intensity']) {
    		$input['intensity'] = $_POST['intensity'];
    		$user_activity_location->update();
    	}

//--------------------------------------------------------
// Retrieve USER info from DB AND match with criteria
// Need to match logged user's user_activity_location choice with DB
		$sql = "
			SELECT *
			FROM user, user_activity_location as ual
			WHERE ual.activity_id = {$input['activity_id']}
			AND ual.location_id = {$input['location_id']}
			AND ual.time = '{$input['time']}'
			AND ual.day = '{$input['day']}'
			AND ual.user_id <> {$input['user_id']}
			AND user.user_id = ual.user_id
			";

		$results = db::execute($sql);

		$matches = [];

		while ($row = $results->fetch_assoc()){
			$matches[] = $row;
		}	
		
		$this->view['matches'] = $matches;

	}

	// $input = [];
	// 	$input['user_id'] = $_POST['user_id'];
 //    	$input['activity_id'] = $_POST['activity'];
 //    	$input['location_id'] = $_POST['location'];
 //    	$input['time'] = $_POST['time'];
 //    	$input['day'] = $_POST['day'];
 //    	$input['intensity'] = $_POST['intensity'];
 //    	$input['name'] = $_POST['name'];

 //    	$user_activity_location = new UserActivityLocation($input);

}
$controller = new Controller();







