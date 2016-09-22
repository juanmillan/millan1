
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
            <h1>Criptoanalisis del Metodo Cesar</h1>
        </hgroup>
    </header>
   <form method="POST" action="Criptoanalisis.php" > <!-- onsubmit="return comprobar()"> -->
            <div style="text-align: center;">
                <font style="font-weight: bold;" size="5">Mensaje</font>
                <br>
                <textarea cols="50" rows="10" name="mensaje"></textarea>
                <br>
                <br>
                Clave: <input type="text" name="clave" maxlength="4" size="4" onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;">
                <br>
                <br>
                <input type="submit"  name="encriptar" value="Encriptar">
                <input type="submit"  name="desencriptar" value="Desencriptar">
                <br>
                <br>
            </div>
        </form>
        <?php
    $mensaje = $_POST['mensaje'];
    $clave = $_POST['clave'];
    $salida    = "";  
    $tarea     = $_POST['tarea'];  
    if(isset($_POST['encriptar'])){

    if($mensaje == '' || $clave == '')
       // echo "<script language='javascript'>alert('Debe Completar Todos los Campos');window.location='Ecesar.php'</script>";
         echo "<script language='javascript'>alert('Debe Completar Todos los Campos');window.location='Criptoanalisis.php'</script>";

      $alfabeto = array(' ','Á', 'É', 'Í', 'Ó', 'Ú', 'á', 'é', 'í', 'ó', 'ú',
                      'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J',
                      'K', 'L', 'M', 'N', 'Ñ', 'O', 'P', 'Q','R', 'S',
                      'T', 'U', 'V', 'W', 'X', 'Y', 'Z','0','1', '2',
                      '3', '4', '5', '6', '7', '8', '9','.', ',',
                      ';','-', '+', '*', "\'",'/','a', 'b', 'c', 'd',
                       'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n',
                       'ñ', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v','w',
                        'x', 'y', 'z','@','"', "'" );

    for($i=0; $i<86; $i++)  $alfabeto[$i] = utf8_decode($alfabeto[$i]);
    $encripta = '';
    $valor = '';

    for( $i=0; $i<strlen($mensaje); $i++ ){
        if (in_array($mensaje[$i], $alfabeto)){
            $valor = array_search($mensaje[$i], $alfabeto);

        $valor = ($valor + $clave) % 86;
        $encripta .= $alfabeto[$valor];
    }
    else 
            $encripta .= $mensaje[$i];
      
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
    <textarea name='mensaje' rows='10' cols='50'>" .$encripta. "</textarea>";
    }
    if(isset($_POST['desencriptar'])){
   
    if($mensaje == '')
       echo "<script language='javascript'>alert('Debe Completar Todos los Campos');window.location='Criptoanalisis.php'</script>";

     $alfabeto = array(' ','Á', 'É', 'Í', 'Ó', 'Ú', 'á', 'é', 'í', 'ó', 'ú',
                      'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J',
                      'K', 'L', 'M', 'N', 'Ñ', 'O', 'P', 'Q','R', 'S',
                      'T', 'U', 'V', 'W', 'X', 'Y', 'Z','0','1', '2',
                      '3', '4', '5', '6', '7', '8', '9','.', ',',
                      ';','-', '+', '*', "\'",'/','a', 'b', 'c', 'd',
                       'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n',
                       'ñ', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v','w',
                        'x', 'y', 'z','@','"', "'" );

    for($i=0; $i<86; $i++)  $alfabeto[$i] = utf8_decode($alfabeto[$i]);

    $encripta = '';
    $valor = '';
    
    if($clave == ''){
        $m = 0;
        
        $letra = '';
        foreach (count_chars($mensaje, 1) as $i => $val) {

            if ($val > $m){
                $m = $val;

                $letra = chr($i);
            }
        }

        $clave = array_search($letra, $alfabeto);

        for( $i=0; $i<strlen($mensaje); $i++ ){
            if (in_array($mensaje[$i], $alfabeto)){
                $valor = array_search($mensaje[$i], $alfabeto);
            
            $valor = ($valor - $clave) % 86;
            if($valor < 0)
                $valor = 86 + $valor;

            $encripta .= $alfabeto[$valor];
        }
            else 
            $encripta .= $mensaje[$i];
        }

     
    }

    else{
        for( $i=0; $i<strlen($mensaje); $i++ ){
            if (in_array($mensaje[$i], $alfabeto)){
                $valor = array_search($mensaje[$i], $alfabeto);
            
            $valor = ($valor - $clave) % 86;
            if($valor < 0)
                $valor = 86 + $valor;

            $encripta .= $alfabeto[$valor];
        }
        else 
            $encripta .= $mensaje[$i];
        }
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
    echo "<br>";
echo '<font >Clave: </font>'.$clave.'';

?>

<br>
<br>
<br>
  
        </body>
</html>

       
