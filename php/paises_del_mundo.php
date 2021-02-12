<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla paises</title>
    <link rel="stylesheet" href="../css/styles.css" type="text/css">
</head>
<body>
    <div class="container">
        <h1>Tabla paises</h1>
        <a href="../html/index.html" class="btn">Volver</a>
        
            <!-- Comienza código PHP -->
            <?php
                // Incluimos la clase necesarias para manejar la BBDD y sus tablas.
                include 'dbPaises.php';
                include 'bbdd.php';
                
                // Creamos el objeto para manejar la tabla.
                $conn = new dbPaises();
                
                // Comprobamos si hemos tenido error en la conexión.
                if ($conn->hayError()){
                    echo ('<p>Fallo al conectar a MySQL: ( ' . $conn->msgError() . ' )</p>');
                } else {
                    echo ('<p>Conexion exitosa</p>');

                    // Creamos la tabla pais y la llenamos con los datos.
                    if (crearEstructuraBBDD($conn)) {
                        
                        // Obtenemos la tabla de datos.
                        $tabla = $conn->obtenerDatos('pais');
                
                        // Comprobamos si hemos obtenido resultados o no.
                        if ($tabla != null) {
                            // Imprimimos el número de filas resultante.
                            echo ('<p>N&uacute;mero de filas = ' . count($tabla) . '</p>');
                        
                            // Imprimimos la cabecera de la tabla
                            echo ('<table><tr><th>CONTINENTE</th><th>PAIS</th></tr>');
                            
                            // Recorremos el resultado y se imprime.
                            foreach ($tabla as $pais) {
                                
                                echo ('<tr>');
                                echo('<td>' . $pais['continente'] . '</td>');
                                echo('<td>' . $pais['nombre'] .'</td>');
                                echo ('</tr>');  
                            };                           

                        } else {
                            echo ('<p>La base de datos est&aacute; vacia</p>');
                        };

                    } else {
                        echo ('<p>Error en la creación de tablas o llenado de datos de BBDD</p>');
                    };

                };               
                
            ?>          
            <!-- Finaliza código PHP -->

        </table>
        
    </div>
</body>
</html>