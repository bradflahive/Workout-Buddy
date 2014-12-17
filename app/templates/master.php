<!DOCTYPE html>
<html class="no-js">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimal-ui" />
	<title>Workout Buddy</title>
	
	<!-- Main CSS -->
	<link rel="stylesheet" href="/bower_components/ReptileForms/dist/reptileforms.min.css">
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Merriweather+Sans:400,300' rel='stylesheet' type='text/css'>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="/css/styles.css">

	<!-- Modernizr -->
	<script src="/bower_components/modernizr/modernizr.js"></script>

</head>
<body>

	<div class="page">
		<?php echo $primary_header; ?>
		<?php echo $main_content; ?>
	</div>

	<!-- Include Common Scripts -->
	<script src="/bower_components/jquery/dist/jquery.js"></script>
	<script src="/bower_components/ReptileForms/dist/reptileforms.js"></script>

	<!-- Get JS -->
	<script>var app = {};app.settings=<?php echo Payload::get_settings(); ?>;</script>
	
	<!-- Main JS -->
	<script src="/js/main.js"></script>

</body>
</html>