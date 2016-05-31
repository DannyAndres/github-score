<!DOCTYPE html>
<html>
	<head>

		<title>score</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="src/css/home.css">
		<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300italic' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href="src/img/img_index/icon.png">

	</head>

	<body>

		<header>

			<div class="header-config">
				<div class="logo">Github Score</div>
				
				<nav>
					<a href="index.html">Inicio</a>
					<a href="http://rogerdudler.github.io/git-guide/index.es.html">Guía Git</a>
					<a href="https://github.com">Github</a>
				</nav>
			</div>

		</header>

		<div id="particles-js"></div>

		<div>
			<div class="master-div col-md-8">
					
				<div class="profile-div poiret col-md-6">
					
					
					<?php

						$user0=$_POST["user0"];

						require 'events_info.php'; 
						require 'user_info.php';
						require 'repo_info.php'; 

					?>
				
					<img class="avatar" width="246" heigth="184" src='<?php echo $firstUser->getUseravatar(); ?>'>
					<br />
					
					<div class="poiret">
						<?php 
							if (is_null($firstUser->getUsername())) {
								require 'config/config_firstuser_withoutName.php';
							}
							else{
								require 'config/config_firstuser_withName.php'; 
							}
						?>
					</div>

				</div>

				<div class="score-div col-md-6">

					<h2 class="sans">Github Score</h2>

					<div class="sans">
						<?php 

							$final_score = (0.4*$eventos->showEventsScore())+(0.4*$firstUser_repo->showStars())+(0.2*$firstUser->getUserfollowers());

							echo "Puntaje Total: "." ".$final_score."<br>";	
						?>					
					</div>

					<h2 class="sans">Eventos</h2>

					<div class="poiret">
						<?php require 'config/score_firstuser.php'; ?>
					</div>
				</div>				
			</div>		
 		</div>

 		<script src="src/js/particles.js"></script>
		<script src="src/js/app.js"></script>

	</body>
</html>