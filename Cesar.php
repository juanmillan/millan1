<?php

include 'MetodoCesar.php';                                   //Incluyo la clase

$mensaje   = $_POST['mensaje'];                 //Mensaje a cifrar

$semilla   = $_POST['semilla'];                 //Semilla o cantidad de rotaciones al mensaje

$tarea     = $_POST['tarea'];                   //Boton pulsado por el usuario

$salida    = "";                                                //Variable que guarda el mensaje

//Aqui esta la magia

if($_POST && $mensaje != "" && $semilla != ""){

//CIFRADO DEL MENSAJE

if($_POST['tarea'] == "Cifrar"){

$cipher    = new Criptoanalisis($mensaje, $semilla);

$salida = $cipher->encode();

}

//DESCIFRADO DEL MENSAJE

if($_POST['tarea'] == "DesCifrar"){

$cipher    = new Criptoanalisis($mensaje,$semilla);

$salida = $cipher->decode();

}

}

?>

<!DOCTYPE html>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html;" />
<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen">
<script type="text/javascript" src="js/jquery-1.6.min.js"></script>
<script src="js/cufon-yui.js" type="text/javascript"></script>
<script src="js/cufon-replace.js" type="text/javascript"></script>
<script src="js/Open_Sans_400.font.js" type="text/javascript"></script>
<script src="js/Open_Sans_Light_300.font.js" type="text/javascript"></script> 
<script src="js/Open_Sans_Semibold_600.font.js" type="text/javascript"></script>  
<script src="js/FF-cash.js" type="text/javascript"></script>
<!--[if lt IE 7]>
	<div style=' clear: both; text-align:center; position: relative;'>
		<a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://www.theie6countdown.com/images/upgrade.jpg" border="0"  alt="" /></a>
	</div>
<![endif]-->
<!--[if lt IE 9]>
	<script type="text/javascript" src="js/html5.js"></script>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen">
<![endif]-->
</head>
<body id="page2">
<!-- header -->
	<div class="bg">
		<div class="main">
			<header>
				<div class="row-1">
					<h4>
						<strong class="slog">Electiva Profesional 3</strong>
					</h4>
					
								
				</div>
				<div class="row-2">
					<nav>
						<ul class="menu">
						  <li ><a href="Cesar.php">encriptacion Cesar</a></li>
						 <li ><a href="Polialfabetico.php">Polialfabetico</a></li>
						</ul>
					</nav>
				</div>
			</header>
<!-- content --><div class="ic">More Website Templates  at TemplateMonster.com!</div>
			<section id="content">
				<div class="padding">
					<div class="wrapper p4">
					  					          
							 			 <form method="post">
 <p align="center">
<strong>Mensaje:</strong> <br><br>

<textarea name="mensaje" rows="10" cols="50"><?php echo $_POST['mensaje']; ?></textarea><br>
<br>


<strong>Numero de rotacion :</strong>

<input type="text" name="semilla" style="width:30px;border:1px solid #555" value="<?php echo $_POST['semilla']; ?>"> 
<br>
<br>

<input type="submit" name="tarea" value="Cifrar"> 

<input type="submit" name="tarea" value="DesCifrar">

</form>
<br>
<br>
<br>
 <p align="center"> <?php

//Muestro el mensaje de salida

if($salida != ""){

echo "<strong> Resultado: </strong> <br> <br>\n";

echo "<textarea name='mensaje' rows='10' cols='50'>" . $salida . "</textarea>";

}

?>					   
					  <div class="col-3">
						  <div class="indent">
						  
							 
						  </div>
					  </div>
						
				  </div>
				  
				</div>
				
			</section>
<!-- footer -->
			<footer>
			  <div class="row-top"></div>
				<div class="row-bot"></div>
			</footer>
		</div>
	</div>
	<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>
