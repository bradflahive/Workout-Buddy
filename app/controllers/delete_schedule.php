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


		$sql =<<<sql
            DELETE 
            FROM 
            user_activity_location
            WHERE user_id = {$input['user_id']}
            AND activity_id = {$input['activity_id']}
            AND location_id = {$input['location_id']}
            AND time = {$input['time']}
            AND day = {$input['day']}
            LIMIT 1;
sql;
        $results = db::execute($sql);

	}

}
$controller = new Controller();