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

<div class="login-content">
	<main class="login-main">

        <h3>LOGIN</h3>
        <form action="/login" method="POST" class="login-form">
            <!-- <input class="fname" type="text" name="first_name" title="First Name"> -->
            <!-- <input class="lname" type="text" name="last_name" title="Last Name"> -->
            <input class="uname" type="text" name="user_name" title="User Name" required>
            <input class="pword" type="password" name="password" data-exp-name="password" title="Password"required>
            <input class="email" type="email" name="email" data-exp-name="email" title="E-mail">
            <br>
            <button class="submit">submit</button><br>
            <button class="sign-up">sign up</button>
        </form>
        <div class="errormsg"></div>
    </main>
</div>
