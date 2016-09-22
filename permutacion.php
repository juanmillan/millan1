
<!DOCTYPE html>

<html>
<head><title>Electiva Profesional</title>
   
    <title>EP3</title>
    <link href="css/html5reset.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <style>
        html{
            background-color:#000000;
            color:#FFFFFF;
        }
        h1{
            color:#3d6fb4;
        }
        h1,h5{
            text-align:center;
        }

    </style>
    <script language="javascript">
            function comprobar(){
                var mensaje = document.inicio.mensaje.value;
                var clave = document.inicio.clave.value;
                
                if (mensaje == "" ){
                    alert("Debe ingresar un mensaje para Encriptar");
                    return false;
                }
                if (clave == "" ){
                    alert("Debe ingresar una Clave Numerica");
                    return false;
                }
                return true;
            }
        </script>
</head>
<body>
    <h1>Electiva Profesional 3</h1>
    <h5>Creado por Juan Millan</h5>
    <hr style="width:60%;">

    <header>
        <hgroup>
            <h1>Permutacion</h1>
        </hgroup>
    </header>
   <form method="POST" action="permutacion.php" > <!-- onsubmit="return comprobar()"> -->
            <div style="text-align: center;">
               <font style="font-weight: bold;" size="5">Mensaje Permutacion</font>
                <br>
                <textarea cols="50" rows="10" name="mensaje" autofocus></textarea>
                <br>
                <br>
                Clave: 
                <input type="text" name="clave" maxlength="9" size="5" onKeypress="if (event.keyCode < 48 || event.keyCode > 56) event.returnValue = false;">
                <br>
                <br>
                <input type="submit"  name="desordenar" value="Desordenar">
                <input type="submit"  name="ordenar" value="Ordenar">
                <br>
                <br>
            </div>
        </form>
        <?php
  
if(isset($_POST['desordenar'])){
    $mensaje = $_POST['mensaje'];
    $clave = $_POST['clave'];

    if($mensaje == '' || $clave == '')
        echo "<script language='javascript'>alert('Debe Completar Todos los Campos');window.location='permutacion.php'</script>";
echo $mensaje.'<br>';
echo $clave.'<br>';
    for( $i=0; $i<strlen($clave); $i++ ){
        if( substr_count($clave, $clave[$i]) > 1 )
            echo "<script language='javascript'>alert('El valor ".$clave[$i]." se repite en la Clave');window.location='permutacion.php'</script>";
    }

    $l = ceil( strlen($mensaje)/strlen($clave) );
    $encripta = '';
    $m='';
    $a=0;
    for ($i=0; $i<$l; $i++){
        for ($j = 0; $j<strlen($clave); $j++){
            if($a < strlen($mensaje)){
                $m[$i][$j] = $mensaje[$a];
            }
            else
                $m[$i][$j] = ' ';
            $a++;
        }
    }

    $aux = '';
    for ($i=0; $i<$l; $i++){
        for ($j = 0; $j<strlen($clave); $j++){
            $v = $clave[$j];
            $aux .= $m[$i][$v];
        }
    }
    $encripta = $aux;
    
  echo "<strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Resultado: </strong> <br> <br>\n";

echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <textarea name='mensaje' rows='10' cols='50'>" .$encripta. "</textarea>";
    }
    
    if(isset($_POST['ordenar'])){
        $mensaje = $_POST['mensaje'];
    $clave = $_POST['clave'];

    if($mensaje == '')
        echo "<script language='javascript'>alert('Debe Completar Todos los Campos');window.location='Permutacion.html'</script>";
echo '<br><br><br>'.$mensaje.'<br><br><br>';
    for( $i=0; $i<strlen($clave); $i++ ){
        if( substr_count($clave, $clave[$i]) > 1 )
            echo "<script language='javascript'>alert('El valor ".$clave[$i]." se repite en la Clave');window.location='Permutacion.html'</script>";
    }

    if($clave == ''){
        //echo '354601782<br>458021367<br>';
        echo $mensaje.'<br><br>';
        
        $clave = '';
        $m = str_split($mensaje, 9);
        $pos = '';
        $d = '';
        for ($i=0; $i<9; $i++){
            $v = ord($mensaje[$i]);
            if ( !($v < 64 || $v > 91)  || !($v < 48 || $v > 48) ){
                $d[0] = $mensaje[$i];
                $d[$i] = $mensaje[0];
                $clave[$i] = $i;
                $pos = $i;
            }
            else
                $d[$i] = $mensaje[$i];
        }
        
        //for ($i=0; $i<count($d); $i++)
            //ksort($d);
        echo $pos.'<br>';
        var_dump($d);





        
        //$clave .= implode('',$clave);
        

/*
        $l = ceil( strlen($mensaje)/strlen($clave) );
    $encripta = '';
    $m='';
    $a=0;
    for ($i=0; $i<$l; $i++){
        for ($j = 0; $j<strlen($clave); $j++){
            if($a < strlen($mensaje)){
                $m[$i][$j] = $mensaje[$a];
            }
            else
                $m[$i][$j] = ' ';
            $a++;
        }
    }

    $aux = '';
    for ($i=0; $i<$l; $i++){
        for ($j = 0; $j<strlen($clave); $j++){
            $v = $clave[$j];
            $aux .= $m[$i][$v];
        }
    }
    $encripta = $aux;
*/
        $encripta = '';
        $clave = '';
    }
    else{
        $l = ceil( strlen($mensaje)/strlen($clave) );
        $encripta = '';
        $aux = '';
        $m='';
        $a=0;
        
        for ($i=0; $i<$l; $i++){
            for ($j = 0; $j<strlen($clave); $j++){
                if($a < strlen($mensaje))
                    $m[$i][$clave[$j]] = $mensaje[$a];
                $a++;
            }
        }

        for ($i=0; $i<$l; $i++){
            ksort($m[$i]);
            $aux .= implode($m[$i]);
        }
        
        $encripta = $aux;
    }
    echo "<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Resultado: </strong> <br> <br>\n";

echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <textarea name='mensaje' rows='10' cols='50'>" .$encripta. "</textarea>";

    }


?>

<br>
<br>
<br>
  
        </body>
</html>
<html>

    <script language="javascript">
            function comprobar(){
                var mensaje2 = document.inicio.mensaje.value;
                var clave2 = document.inicio.clave.value;
                
                if (mensaje2 == "" ){
                    alert("Debe ingresar un mensaje para Encriptar");
                    return false;
                }
                if (clave2 == "" ){
                    alert("Debe ingresar una Clave Numerica");
                    return false;
                }
                return true;
            }
        </script>
</head>

   <form method="POST" action="permutacion.php" > <!-- onsubmit="return comprobar()"> -->
            <div style="text-align: center;">
                <font style="font-weight: bold;" size="5">Mensaje Encriptar</font>
                <br>
                <textarea cols="50" rows="10" name="mensaje2"></textarea>
                <br>
                <br>
                Clave: <input type="text" name="clave2" maxlength="4" size="4" onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;">
                <br>
                <br>
                <input type="submit"  name="encriptar2" value="Encriptar">
                <input type="submit"  name="desencriptar2" value="Desencriptar">
                <br>
                <br>
            </div>
        </form>
        <?php

    
      
    if(isset($_POST['encriptar2'])){
$mensaje2 = $_POST['mensaje2'];
    $clave2 = $_POST['clave2'];

    if($mensaje2 == '' || $clave2 == '')
       // echo "<script language='javascript'>alert('Debe Completar Todos los Campos');window.location='Ecesar.php'</script>";
         echo "<script language='javascript'>alert('Debe Completar Todos los Campos');window.location='permutacion.php'</script>";
echo $mensaje2.'<br>';
echo $clave2.'<br>';
    $alfabeto2 = array('Á', 'É', 'Í', 'Ó', 'Ú', 'á', 'é', 'í', 'ó', 'ú',
                      'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J',
                      'K', 'L', 'M', 'N', 'Ñ', 'O', 'P', 'Q','R', 'S',
                      'T', 'U', 'V', 'W', 'X', 'Y', 'Z','0','1', '2',
                      '3', '4', '5', '6', '7', '8', '9', ' ','.', ',',
                      ';','-', '+', '*', "\'",'/','a', 'b', 'c', 'd',
                       'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n',
                       'ñ', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v','w',
                        'x', 'y', 'z','@','"', "'" );

    for($i=0; $i<86; $i++)  $alfabeto2[$i] = utf8_decode($alfabeto2[$i]);
        

    $encripta2 = '';
    $valor2 = '';

    for( $i=0; $i<strlen($mensaje2); $i++ ){
        if (in_array($mensaje2[$i], $alfabeto2)){
            $valor2 = array_search($mensaje2[$i], $alfabeto2);
        
        
        $valor2 = ($valor2 + $clave2) % 86;
        $encripta2 .= $alfabeto2[$valor2];
    }
        else
           $encripta2 .= $mensaje2[$i];
        
        
      }
    
  echo "<strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Resultado: </strong> <br> <br>\n";

echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <textarea name='mensaje' rows='10' cols='50'>" .$encripta2. "</textarea>";
    }
    if(isset($_POST['desencriptar2'])){
        $mensaje2 = $_POST['mensaje2'];
    $clave2 = $_POST['clave2'];


    if($mensaje2 == '' || $clave2 == '')
       echo "<script language='javascript'>alert('Debe Completar Todos los Campos');window.location='permutacion.php'</script>";

   $alfabeto2 = array('Á', 'É', 'Í', 'Ó', 'Ú', 'á', 'é', 'í', 'ó', 'ú',
                      'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J',
                      'K', 'L', 'M', 'N', 'Ñ', 'O', 'P', 'Q','R', 'S',
                      'T', 'U', 'V', 'W', 'X', 'Y', 'Z','0','1', '2',
                      '3', '4', '5', '6', '7', '8', '9', ' ','.', ',',
                      ';','-', '+', '*', "\'",'/','a', 'b', 'c', 'd',
                       'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n',
                       'ñ', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v','w',
                        'x', 'y', 'z','@','"', "'" );
echo '<br><br><br>'.$mensaje2.'<br><br><br>';
    for($i=0; $i<86; $i++)  $alfabeto2[$i] = utf8_decode($alfabeto2[$i]);

    $encripta2 = '';
    $valor2 = '';

    for( $i=0; $i<strlen($mensaje2); $i++ ){
        if (in_array($mensaje2[$i], $alfabeto2)){
            $valor2 = array_search($mensaje2[$i], $alfabeto2);

        $valor2= ($valor2 - $clave2) % 86;
        if($valor2 < 0)
            $valor2 = 86 + $valor2;
        $encripta2 .= $alfabeto2[$valor2];}
        else 
            $encripta2 .= $mensaje2[$i];
    }
    echo "<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Resultado: </strong> <br> <br>\n";

echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <textarea name='mensaje' rows='10' cols='50'>" .$encripta2. "</textarea>";

    }


?>

<br>
<br>
<br>
  
        </body>
</html>
       
