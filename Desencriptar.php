<?php
	$mensaje = $_POST['mensaje'];
	$clave = $_POST['clave'];
	$fila = $_POST['fila'];
	$columna = $_POST['columna'];

	if($mensaje=='' || $clave=='' || $fila=='' || $columna=='')
		echo "<script language='javascript'>alert('Debe Completar Todos los Campos');window.location='Polialfabetico.html'</script>";

 $alfabeto = array('Á', 'É', 'Í', 'Ó', 'Ú', 'á', 'é', 'í', 'ó', 'ú',
                      'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J',
                      'K', 'L', 'M', 'N', 'Ñ', 'O', 'P', 'Q','R', 'S',
                      'T', 'U', 'V', 'W', 'X', 'Y', 'Z','0','1', '2',
                      '3', '4', '5', '6', '7', '8', '9', ' ','.', ',',
                      ';','-', '+', '*', "\'",'/','a', 'b', 'c', 'd',
                       'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n',
                       'ñ', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v','w',
                        'x', 'y', 'z','@','"', "'", '¡', '!', '?' , '¿');

	
	for($i=0; $i<86; $i++)
		$alfabeto[$i] = utf8_decode($alfabeto[$i]);

	/*for( $i=0; $i<strlen($clave); $i++ ){
		if ( array_search($clave[$i], str_split($clave)) )
			echo "<script language='javascript'>alert('El caracter ".$clave[$i]." de la CLAVE Esta Repetido');window.location='Polialfabetico.html'</script>";
	}

	for( $i=0; $i<strlen($fila); $i++ ){
		if (!in_array($fila[$i], $alfabeto))
			echo "<script language='javascript'>alert('El caracter ".$fila[$i]." de la FILA no esta en el Alfabeto');window.location='Polialfabetico.html'</script>";
		if ( array_search($fila[$i], str_split($columna)) )
			echo "<script language='javascript'>alert('El caracter ".$fila[$i]." de la FILA Esta en la COLUMNA');window.location='Polialfabetico.html'</script>";
		if ( array_search($fila[$i], str_split($fila)) )
			echo "<script language='javascript'>alert('El caracter ".$fila[$i]." de la FILA Esta Repetido');window.location='Polialfabetico.html'</script>";
	}

	for( $i=0; $i<strlen($columna); $i++ ){
		if (!in_array($columna[$i], $alfabeto))
			echo "<script language='javascript'>alert('El caracter ".$columna[$i]." de la COLUMNA no esta en el Alfabeto');window.location='Polialfabetico.html'</script>";
		if ( in_array($columna[$i], str_split($fila)) )
			echo "<script language='javascript'>alert('El caracter ".$columna[$i]." de la COLUMNA Esta en la FILA');window.location='Polialfabetico.html'</script>";
		if ( array_search($columna[$i], str_split($columna)) )
			echo "<script language='javascript'>alert('El caracter ".$columna[$i]." de la COLUMNA Esta Repetido');window.location='Polialfabetico.html'</script>";
	}
*/

	$encripta = '';
	$m = '';
	$n = '';
	$a = 0;

	if($clave == '' || $fila == '' || $columna == ''){
		

		for ($a = 0; $a<strlen($mensaje); $a+=2)
			$encripta .= $m[ $mensaje[$a] ][ $mensaje[$a+1] ];
	}
	else{
		for ($i=0; $i<9; $i++){
			for ($j = 0; $j<10; $j++){
				if($i==0 && $j<strlen($clave))
					$m[ $fila[$i] ][ $columna[$j] ] = $clave[$j];
				
				elseif ( !in_array($alfabeto[$a], $m[$fila[0]]) ){
					$m[ $fila[$i] ][ $columna[$j] ] = $alfabeto[$a];
					$a++;
				}
				else{
					$a++;
					$j--;
				}
			}
		}

		for ($a = 0; $a<strlen($mensaje); $a+=2)
			$encripta .= $m[ $mensaje[$a] ][ $mensaje[$a+1] ];
	}
?>

<html>
	<head>
		<title>Criptoanalisis Playfair</title>
	</head>

	<body>
		<form action="" method="POST">
			<div style='text-align: center;'>
				<font style='font-weight: bold;' size='5'>Resultado</font>
				<br>
				<textarea cols='50' rows='10' name='resultado' disabled><?php echo $encripta; ?></textarea>
				<br>
				<br>
				Clave: <b><?php echo $clave; ?></b>
				<br>
				Fila: <b><?php echo $fila; ?></b>
				<br>
				Columna: <b><?php echo $columna; ?></b>
				<br>
				<br>
				<input type='button' value='Atras' onClick='history.go(-1);'>
			</div>
		</form>
	</body>
</html>