<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Template</title>
<style>
	header{
		position: relative;
		margin:auto;
		text-align:center;
		padding: 5px;
	}
	nav{
		position: relative;
		margin:auto;
		width:100%;
		height:auto;
		background: #17569F;

	}
	nav ul{
		position: relative;
		margin: auto;
		width: 70%;
		text-align: center;
	}
	nav ul li{
		display: inline-block;
		width: 13.5%;
		line-height: 50px;
		list-style: none;

	}
	nav ul li a{
		color:white;
		text-decoration: none;
	}
	section{
		position: relative;
		padding: 20px;
	}

</style>

</head>
<body>
	<header>
		<h1 style=color:black>MASTERDENT</h1> <h2 style=color:black>TRAZABILIDAD</h2>

	</header>
	<?php
	include "modulos/navegacion.php";

	?>

  

	<section>
		<?php
		$mvc = new MvcController();
		$mvc -> enlacesPaginasController();


		?>
	</section>
</body>
</html>