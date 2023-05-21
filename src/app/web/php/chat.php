<?php

include "db.php";

$consulta = "SELECT * FROM chat ORDER BY id DESC";
$ejecutar = $conexion->query($consulta);
while ($fila = $ejecutar->fetch_array()) :
?>
    <div class="area-comentar">
        <div><b><?php echo $fila['nombre']; ?></b> - <i><?php echo formatearFecha($fila['fecha']); ?></div></i>
        <p class="oldmsg"><?php echo $fila['mensaje']; ?></p>

    </div>
<?php endwhile; ?>