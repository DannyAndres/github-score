<!DOCTYPE html>
<html>
	<head>
		<title>Battle</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="../resources/css/battle.css">
		<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300italic' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href="../resources/img_index/icon.png">

	</head>
	<body>
		<header>

			<div class="header-config">
				<div class="logo">Github Score</div>
				
				<nav>
					<a href="../index.php">Inicio</a>
					<a href="http://rogerdudler.github.io/git-guide/index.es.html">Guía Git</a>
					<a href="https://github.com">Github</a>
					<a href="stars.html">Estrellas</a>
				</nav>
			</div>

		</header>

		<div id="particles-js"></div>

		<?php include("../resources/function/function.php"); ?>

		<div class="master-div col-md-8">

			<div>
				<div class="profile-div poiret col-md-3">
							
					<img class="avatar" width="246" heigth="184" src='<?php echo $json_profile1["avatar_url"]; ?>'>
					<br />

					<?php include("../resources/user_info_battle/user_info1.php"); ?>

				</div>
				<div class="score-div col-md-3">

					<?php include("../resources/user_info_battle/user_score1.php"); ?>

				</div>
			</div>

			<div>
				<div class="score-div col-md-3">

					<?php include("../resources/user_info_battle/user_score2.php"); ?>

				</div>
				<div class="profile-div poiret col-md-3">
							
					<img class="avatar" width="246" heigth="184" src='<?php echo $json_profile2["avatar_url"]; ?>'>
					<br />

					<?php include("../resources/user_info_battle/user_info2.php"); ?>

				</div>
			</div>

		</div>

		<div>
			
			<?php include("../resources/user_info_battle/winner.php"); ?>

		</div>

		<script src="../resources/js/particles.js"></script>
		<script src="../resources/js/app.js"></script>

	</body>
</html>