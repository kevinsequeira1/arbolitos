<?php
	include 'db.php';
	#RECIBIR ARCHIVOS MULTIMEDIA
#-----------------------------------------------------------
	if(isset($_POST["tituloProducto"]) && isset($_POST["multimedia"])){

		$sql = $mysqli->query("INSERT INTO gallery(title, images) VALUES('".$_POST["tituloProducto"]."','".$_POST["multimedia"]."') ");

		if ($sql) {
			echo "ok";
		}else{	
			echo "error";
		}


	}

	