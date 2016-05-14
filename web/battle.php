<!DOCTYPE html>
<html>
<head>
	<title>Github Battle</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/main.css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>

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

</head>
<body>
	
	<div class="text-color" id="particles-js">
		<div class="centrar-stars" style="margin-top: 130px; margin-left: -300px;">
			<div>
				<img style="border-radius: 10px; margin-left:42px;" width="150" heigth="70" src='../img/github_cat2.png'>	
			</div>

			<form action="battle_.php" method="post" name="frm" style="margin-top: -35px;">
	    
	    		<p class="texto text-color" style="margin-left: 35px;">Inserte los Usuarios Aquí</p>
	    		<input type="text" name="user" style="border-radius: 12px; height: 30px; margin-left: 31px;" /><br />
	    		<br>
	    		<input type="text" name="user" style="border-radius: 12px; height: 30px; margin-left: 31px;" /><br />
	    		<br /><input type="submit" name="Enviar" value="Listo!" class="boton" style="border-radius: 10px; width: 140px; height: 30px; margin-left:46px;" />
			</form>
		</div>






	</div>

	<script src="../js/particles.js"></script>
	<script src="../js/app.js"></script>

</body>
</html>