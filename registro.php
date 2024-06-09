<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta DB</title>
    <style type="text/css">
     
      table {
        border: solid 2px #7e7c7c;
        border-collapse: collapse;
                     
      }
     
      th, h1 {
        background-color: #edf797;
      }

      td,
      th {
        border: solid 1px #7e7c7c;
        padding: 2px;
        text-align: center;
      }


    </style>
</head>
<body>
    
</body>
</html>

<?php
//validamos datos del servidor
$user = "root";
$pass = "";
$host = "localhost";

//conetamos al base datos
$connection = mysqli_connect($host, $user, $pass);

//verificamos la conexion a base de datos
if(!$connection) {
    echo "No se ha podido conectar con el servidor" . mysqli_error($connection);
} else {
    echo "<b><h3>Hemos conectado al servidor</h3></b>" ;
}

//indicamos el nombre de la base de datos
$datab = "dbformulario";
//indicamos seleccionar la base de datos
$db = mysqli_select_db($connection,$datab);

if (!$db) {
    echo "No se ha podido encontrar la Tabla";
} else {
    echo "<h3>Tabla seleccionada:</h3>" ;
}

// Insertamos datos de registro a MySQL indicando nombre de la tabla y sus atributos para tabla_form
$nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
$usuario = isset($_POST["usuario"]) ? $_POST["usuario"] : "";
$contraseña = isset($_POST["contraseña"]) ? $_POST["contraseña"] : "";

$instruccion_SQL1 = "INSERT INTO tabla_form (nombre, usuario, contraseña)
                    VALUES ('$nombre','$usuario','$contraseña')";
$resultado1 = mysqli_query($connection,$instruccion_SQL1);

// Consulta para la primera tabla (tabla_form)
$consulta1 = "SELECT * FROM tabla_form";
$result1 = mysqli_query($connection, $consulta1);
if (!$result1) {
    echo "No se ha podido realizar la consulta para la tabla 1: " . mysqli_error($connection);
}

// Mostrar los resultados en tablas HTML para la primera tabla (tabla_form)
echo "<table>";
echo "<tr>";
echo "<th><h1>ID</h1></th>";
echo "<th><h1>Nombre</h1></th>";
echo "<th><h1>Usuario</h1></th>";
echo "<th><h1>Contraseña</h1></th>";
echo "</tr>";

while ($row1 = mysqli_fetch_array($result1)) {
    echo "<tr>";
    echo "<td><h2>" . $row1['id'] . "</h2></td>";
    echo "<td><h2>" . $row1['nombre'] . "</h2></td>";
    echo "<td><h2>" . $row1['usuario'] . "</h2></td>";
    echo "<td><h2>" . $row1['contraseña'] . "</h2></td>";
    echo "</tr>";
}

echo "</table>";

// Insertamos datos de registro a MySQL indicando nombre de la tabla y sus atributos para vacantes
$Nombres = isset($_POST["Nombres"]) ? $_POST["Nombres"] : "";
$Apellidos = isset($_POST["Apellidos"]) ? $_POST["Apellidos"] : "";
$Correo = isset($_POST["Correo"]) ? $_POST["Correo"] : "";

$instruccion_SQL2 = "INSERT INTO vacantes (Nombres, Apellidos, Correo)
                    VALUES ('$Nombres','$Apellidos','$Correo')";
$resultado2 = mysqli_query($connection,$instruccion_SQL2);

// Consulta para la segunda tabla (vacantes)
$consulta2 = "SELECT * FROM vacantes";
$result2 = mysqli_query($connection, $consulta2);
if (!$result2) {
    echo "No se ha podido realizar la consulta para la tabla 2: " . mysqli_error($connection);
}

// Mostrar los resultados en tablas HTML para la segunda tabla (vacantes)
echo "<table>";
echo "<tr>";
echo "<th><h1>ID</h1></th>";
echo "<th><h1>Nombres</h1></th>";
echo "<th><h1>Apellidos</h1></th>";
echo "<th><h1>Correo</h1></th>";
echo "</tr>";

while ($row2 = mysqli_fetch_array($result2)) {
    echo "<tr>";
    echo "<td><h2>" . $row2['Id'] . "</h2></td>";
    echo "<td><h2>" . $row2['Nombres'] . "</h2></td>";
    echo "<td><h2>" . $row2['Apellidos'] . "</h2></td>";
    echo "<td><h2>" . $row2['Correo'] . "</h2></td>";
    echo "</tr>";
}

echo "</table>";

mysqli_close($connection);

echo '<a href="index.html">Volver Atrás</a>';
?>
