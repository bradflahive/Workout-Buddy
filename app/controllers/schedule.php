<?php

// Controller
class Controller extends AppController {
	protected function init() {

		$user_id = UserLogin::getUserID();

		if (!$user_id){
			header('Location: /');
            exit();
		}

		$user = new User(UserLogin::getUserID());
		$_POST['user_id'] = $user->user_id;

        $sql = "
        	SELECT *
        	FROM user_activity_location as ual, location, activity
        	WHERE user_id = '{$_POST['user_id']}'
        	AND ual.activity_id = activity.activity_id
        	AND ual.location_id = location.location_id
        	ORDER BY day, time
        	";

        $results = db::execute($sql);

        $dow = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
        $tod = array('5:00am', '6:00am', '7:00am', '8:00am', '12:00pm', '5:00pm', '6:00pm', '7:00pm', '8:00pm');

        $current_day = '';
        $schedule = '';

		while ($row = $results->fetch_assoc()){
	
			if ($row['day'] != $current_day) {
				$current_day = $row['day'];

				$schedule .= str_replace('{{search}}', $event_info_html, $day_html);

				// Here is the code for setting up
				$day_html = '<div class="day"><p>' . $dow[$row['day']] . '</p>{{search}}</div>';
				$event_info_html = '';
			}

			$event_info_html .= '
				<div class="event-info">
					<input type="hidden" name="activ-id" class="activ-id" value="' .$row['activity_id']. '">
					<input type="hidden" name="loc-id" class="loc-id" value="' .$row['location_id']. '">
					<input type="hidden" name="day-id" class="day-id" value="' .$row['day']. '">
					<input type="hidden" name="time-id" class="time-id" value="' .$row['time']. '">
					<div class="event time">' .  $tod[$row['time']] . '</div>
					<div class="event location">' .  $row['location_name'] . '</div>
					<div class="event activity">'.  $row['activity_name'] . '</div>
					<div class="event intensity">Intensity Level: '  .  $row['intensity'] . '</div>
					<div class="bail">bail</div>
				</div>
				';
		}

		$schedule .= str_replace('{{search}}', $event_info_html, $day_html);

		$this->view->schedule = $schedule;

	}
}
$controller = new Controller();

// Extract Main Controller Vars
extract($controller->view->vars);

?>

<div class="event-content">
	
	<?php echo $schedule; ?>

</div>



