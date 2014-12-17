<?php

// Controller
class Controller extends AppController {
	protected function init() {
		

	}
}
$controller = new Controller();

// Extract Main Controller Vars
extract($controller->view->vars);

?>

<div class="primary-content">
	<div class="about">
		<p>Welcome to Workout Buddy!<br></p>
		<p>Workout Buddy is designed to bring people together based on the user specified workout criteria:
		<ul>
			<li>The Day you would like to workout</li>
			<li>The Time you would like to workout</li>
			<li>The Activity you chose as your workout</li>
			<li>The Intensity Level of your Activity</li>
			<li>The Location (eg: Gym, Park) of your Activity</li>
		</ul>
		</p>
	</div>
</div>
