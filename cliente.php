<?php
// Vaciamos algunas variables
$error = "";
$resultado = "";
$numero1 = "";
$numero2 = "";

// Iniciamos el cliente SOAP
// Escribimos la dirección donde se encuentra el servicio
$url = "https://tadaybryan.000webhostapp.com/WebServiceSoap/servidor.php";
$uri = "https://tadaybryan.000webhostapp.com/WebServiceSoap/";
$cliente = new SoapClient(null, array('location' => $url, 'uri' => $uri));

// Ejecutamos las siguientes líneas al enviar el formulario
if (isset($_POST['enviar'])) {
    // Establecemos los parámetros de envío
    if ( !empty($_POST['numero1']) && !empty($_POST['numero2']) ) {
        $numero1 = $_POST['numero1'];
        $numero2 = $_POST['numero2'];
        // Si los parámetros son correctos, llamamos a la función letra de calcularLetra.php
        $resultado = "La suma es: " . $cliente->suma($numero1, $numero2);
    } else {
        $error = "<strong>Error:</strong> Debes introducir 2 numeros<br/>Ej: 1 - 1000000000000000000";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sumar 2 numeros - Servicio Web + PHP + SOAP</title>
        <link rel="stylesheet" type="text/css" href="estilo.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
<body>
    <h1>Sumar 2 numeros con web service</h1>
    <div class="container container-form">
        <div class="titulo">
            <h2>Servicio Web + PHP + SOAP</h2>
        </div>
        <div class="formulario">
            <form action="cliente.php" method="post">
            <?php
                print "Ingrese numero<input class='form-control mb-3' type='number' name='numero1' value='$numero1'>";
                print "Ingrese numero<input class='form-control mb-3' type='number' name='numero2' value='$numero2'>";
                print "<hr>";
                print "<input class='btn btn-primary' type='submit' name='enviar' value='Calcular'>";
                print "<p class='error'>$error</p>";
                print "<p style='font-size: 28pt;font-weight: bold;color: #776EFF;'>$resultado</p>";
            ?>
            </form>
        </div>
    </div>
</body>
</html>