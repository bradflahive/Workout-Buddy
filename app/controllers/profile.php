<?php

// Controller
class Controller extends AppController {
	protected function init() {
		
		$user_id = UserLogin::getUserID();

		if (!$user_id){
			header('Location: /');
            exit();
		}
		
		// Retrieve Activities
		$getActivities = "
        			SELECT *
        			FROM activity";

        $results = db::execute($getActivities);

		while ($row = $results->fetch_assoc()) {
			$this->view->activities .= '<option value="' .  $row['activity_id'] . '">' . $row['activity_name'] . '</option>';
		}

		// Retrieve Locations
		$getLocations = "
        			SELECT *
        			FROM location";

        $results = db::execute($getLocations);

		while ($row = $results->fetch_assoc()) {
			$this->view->locations .= '<option value="' . $row['location_id'] . '">' . $row['location_name'] . '</option>';
		}

	}
}
$controller = new Controller();

// Extract Main Controller Vars
extract($controller->view->vars);

?>

<div class="primary-content">

	<aside class="criteria-info">
		<div class="criteria-title">
			<p>Create A Workout</p>
		</div>
		<form action="/find_matches" method="post">
		<!-- <input type="hidden" name="user_id" value="<?php echo $user_id ?>"> -->
		<!-- <div class="criteria day"> -->
			<p><i class="fa fa-plus-circle"></i> Day</p>
			<select id="day1" name="day" required>
				<option value="">Select a day...</option>
				<option value="0">Monday</option>
				<option value="1">Tuesday</option>
				<option value="2">Wednesday</option>
				<option value="3">Thursday</option>
				<option value="4">Friday</option>
				<option value="5">Saturday</option>
				<option value="6">Sunday</option>
			</select>
		<!-- </div> -->

		<!-- <div class="criteria time"> -->
			<p><i class="fa fa-plus-circle"></i> Time</p>
			<select id="time1" name="time" required>
				<option value="">Select a time...</option>
				<option value="0">5:00am</option>
				<option value="1">6:00am</option>
				<option value="2">7:00am</option>
				<option value="3">8:00am</option>
				<option value="4">12:00pm</option>
				<option value="5">5:00pm</option>
				<option value="6">6:00pm</option>
				<option value="7">7:00pm</option>
				<option value="8">8:00pm</option>
			</select>
		<!-- </div> -->

		<!-- <div class="criteria activity"> -->
			<p><i class="fa fa-plus-circle"></i> Activity</p>
			<select id="activity1" name="activity" required>
				<option value="">Select an activity...</option>
				<?php echo $activities; ?>
			</select>
		<!-- </div> -->

		<!-- <div class="criteria intensity"> -->
			<p><i class="fa fa-plus-circle"></i> Intensity</p>
			<select id="intensity1" name="intensity" required>
				<option value="">Select an intensity...</option>
				<option value="1">Intensity Level 1</option>
				<option value="2">Intensity Level 2</option>
				<option value="3">Intensity Level 3</option>
				<option value="4">Intensity Level 4</option>
				<option value="5">Intensity Level 5</option>
			</select>
		<!-- </div> -->

		<!-- <div class="criteria location"> -->
			<p><i class="fa fa-plus-circle"></i> Location</p>
			<select id="location1" name="location" required>
				<option value="">Select a location...</option>
				<?php echo $locations; ?>
			</select>
		<!-- </div> -->

		<div class="criteria-display">
			<p>Your Workout</p>
			<button class="add">Add Workout</button>
			<div id="displayresponse-day"></div>
			<div id="displayresponse-time"></div>
			<div id="displayresponse-activity"></div>
			<div id="displayresponse-intensity"></div>
			<div id="displayresponse-location"></div>
		</div>
		
		</form>
	</aside>
	
	<main>

		<div class="buddies">
			<div class="notices">
				<p></p>
			</div>
		
		</div>

	</main>

</div>













