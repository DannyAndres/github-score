<!DOCTYPE html>
<html>
<head>
	<title>Estrellas</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/main.css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
</head>
<style>
body{
	background-color: #3d3d43;
}
#particles-js{
	width: 100%;
	height: 100%;
	position: fixed;

}
</style>

<body>
<div id="particles-js"></div>

	<div class="espacio-arriba-index centrar-stars" style="margin-left: -340px; margin-top: 170px;">
		
		<img width="246" heigth="184" src='../img/github-logo.png'>
		
		<h1 class="pacifico text-black" style="margin-left: 180px; margin-top: -20px;">Score</h1>
		

		<form action="stars_.php" method="post" name="frm">
    
    		<p class="texto text-color" style="margin-left: 20px;">Inserte Nombre de Usuario Aquí</p>
    		<input type="text" name="user" style="border-radius: 12px; height: 30px; margin-left: 31px;" /><br />
    		<br /><input type="submit" name="Enviar" value="Listo!" class="boton" style="border-radius: 10px; width: 140px; height: 30px; margin-left:46px;" />
		</form>
		<nav class="texto" style="margin-left: 45px; margin-top: 100px;">
			<a href="../index.html" style="color: white;">Inicio</a>
			&nbsp &nbsp &nbsp &nbsp
			<a href="https://github.com" style="color: white;">Github Oficial</a>
		</nav>
		
		

	</div>
	<div class="text-color derecha" style="margin-top: -10px; margin-right: 150px;">
			<?php 
				$user=$_POST["user"];
				$url_repo="https://api.github.com/users/".$user."/repos";

				$ch=curl_init();                                       
				curl_setopt($ch, CURLOPT_URL, $url_repo);   
				curl_setopt($ch, CURLOPT_USERAGENT, 'DannyAndres');                 
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);       
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);      
				$curl_repo=curl_exec($ch);                    
				$json_repo=json_decode($curl_repo, true);          
				curl_close($ch);  

				if ($user==!"") {

					echo "Usuario: ".$user."<br>";

					foreach ($json_repo as $var) { 
					echo "<p class='texto'>Nombre del repositorio: ".$var["name"]."</p>";
					echo "Estrellas: ".$var["stargazers_count"];
					echo "<br>";
					} 

					echo "<br>";

					foreach ($json_repo as $var) { 

						$suma=$suma+$var["stargazers_count"];
							
					} 
				}

 			if ($user==!"") {
 			?>
 				<div class="texto derecha" style="margin-right: -650px; margin-top: 150px; font-size: 25px;">
 					<?php
 						echo "<h2>Estrellas Totales: </h2>".$suma;
 					?>
 				</div>
 			<?php } ?>
		</div>
		<script src="../js/particles.js"></script>
		<script src="../js/app.js"></script>

</body>
</html>

<!--EL SCRIPT PARA LAS PARTICULAS LO SAQUE DE LA PAGINA 
http://vincentgarreau.com/particles.js/
SOLO LO TUVE QUE PEGAR JUNTO CON BAJAR Y ENLAZAR ARCHIVOS-->
