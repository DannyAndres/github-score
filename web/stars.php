<!DOCTYPE html>
<html>

	<head>

		<title>stars</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="../resources/css/stars.css">
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

		<div class="master-div col-md-8">


			<div class="first-form-div col-md-6 poiret">

				<h1 class="pacifico center-title">Github Stars</h1>
				<?php
					include("../resources/function/function.php");

					if ($user0==!"") {

						echo "Usuario: ".$user0."<br>";
						
						foreach ($json_repo0 as $var) { 
						echo "<p class='texto'>Nombre del repositorio: ".$var["name"]."</p>";
						echo "Estrellas: ".$var["stargazers_count"];
						echo "<br>";
						} 

						echo "<br>";
					}
				?>
			
			</div>

			<div class="second-div col-md-6">

				<h1 class="pacifico center-title">información</h1>
				<img class="avatar" width="246" heigth="184" src='<?php echo $json_profile0["avatar_url"]; ?>'>
				<br />
				<?php 
					include("../resources/user_info_score/user_info.php");
				?>

			</div>

		</div>

		<script src="../resources/js/particles.js"></script>
		<script src="../resources/js/app.js"></script>

	</body>
	
</html>