<?php

// aca incluimos la conexion
$inc = include("Connection.php");

// aca se genera la consulta que se requiere para la base de datos
if ($inc)
{
    $conexion = new \PDO("mysql:host=$server;dbname=$database", $username, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $consulta = "SELECT * FROM pacientes";
    $resultado = $conexion->query($consulta);

    if($resultado) {
        while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {           
            $mascota = $row['mascota'];
            $edad = $row['edad'];
            $propietario = $row['propietario'];
            $telefono = $row['telefono'];
            $id = $row['id'];
            ?>
            <div>
                <h2><?php echo $mascota; ?></h2>
                <div>
                    <p>
                        <b>EDAD: </b> <?php echo $edad; ?><br>
                        <b>PROPIETARIO: </b> <?php echo $propietario; ?><br>
                        <b>TELEFONO: </b> <?php echo $telefono; ?><br>
                        <b>ID: </b> <?php echo $id; ?><br>
                    </p>
                </div>
            </div>
            <?php
        }
    }
}

?>