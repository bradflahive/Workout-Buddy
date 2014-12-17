<?php

// Init
include($_SERVER['DOCUMENT_ROOT'] . '/app/core/initialize.php');

// Main Sections
Router::add('/', '/app/controllers/home.php');

// Users
Router::add('/profile', '/app/controllers/profile.php');
Router::add('/schedule', '/app/controllers/schedule.php');
Router::add('/about', '/app/controllers/about.php');

//Log In:
Router::add('/login', '/app/controllers/login/login.php');
Router::add('/account', '/app/contollers/login/account.php');
Router::add('/logout', '/app/controllers/login/logout.php');

//Matches
Router::add('/find_matches', '/app/controllers/find_matches.php');
Router::add('/delete_schedule', '/app/controllers/delete_schedule.php');

// Issue Route
Router::route();