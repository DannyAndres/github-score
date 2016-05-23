<!DOCTYPE html>
<html>

	<head>

		<title>Home</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="resources/css/index.css">
		<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300italic' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href="resources/img_index/icon.png">
		
	</head>

	<body>

		<header>

			<div class="header-config">
				<div class="logo">Github Score</div>
				
				<nav>
					<a href="index.php">Inicio</a>
					<a href="http://rogerdudler.github.io/git-guide/index.es.html">Guía Git</a>
					<a href="https://github.com">Github</a>
					<a href="web/stars.html">Estrellas</a>
				</nav>
			</div>

		</header>

		<div id="particles-js"></div>

		<div class="master-div col-md-8">


			<div class="first-form-div col-md-4">

				<h1 class="pacifico center-title">Github Score</h1>

				<form class="first-form" action="web/score.php" method="post" name="frm">
		   
		    		<p class="first-form-text poiret">Inserte Nombre de Usuario Aquí</p>
		    		<input class="first-form-input" placeholder="Usuario" type="text" name="user0"/>
		    		<br /><br />
					<input class="first-form-botom" type="submit" name="Enviar" value="Listo!" class="boton"/>

				</form>
			
			</div>

			<div class="col-md-4 second-form-div">

				<h1 class="pacifico center-title">Github battle</h1>

				<form class="second-form" action="web/battle.php" method="post" name="frm">
	    
		    		<p class="second-form-text poiret">Inserte los Usuarios Aquí</p>
		    		<input class="second-form-input" placeholder="Primer Usuario" type="text" name="user1"/>
		    		<br /><br />
		    		<input class="second-form-input" placeholder="Segundo Usuario" type="text" name="user2"/>
		    		<br /><br />
		    		<input class="second-form-botom" type="submit" name="Enviar" value="Listo!" class="boton"/>

				</form>

			</div>

			<div class="col-md-4 third-form-div">

				<div class="sans">
					<h2>El calculo final del puntaje</h2>
				</div>
				<div class="poiret score">
					<p>se calcula ponderando</p>
					<p>los puntajes totales</p>
					<p>de la siguiente forma: </p>
					<p>40% de Puntaje por los Eventos +</p>
					<p>40% de Estrellas Totales +</p>
					<p>20% de Numero de seguidores</p>
				</div>

			</div>

		</div>

		<div class="div-troll">
			<p class="poiret">&nbsp&nbspEscribe chewbacca&nbsp&nbsp</p>
			<img src="resources/img_index/trollface.png" alt="imagen" width="30" heigth="20"/>
		</div>

		<script src="resources/js/particles.js"></script>
		<script src="resources/js/app.js"></script>

	</body>
	
</html>

