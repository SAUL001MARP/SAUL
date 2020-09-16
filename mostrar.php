<?php 
    include('conexion.php');
    $listVer=$conexion->query("SELECT * FROM tblaudios ORDER BY id_audio");

?>









<html lang="es">
    <head>
        <title>Proyecto_Saul</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/estilos.css">
    </head>
    <body>
        <header>
            <div class="alert alert-info">
            <h3>Lista de Audios</h3>
            </div>
        </header>
<section>
<? echo $mensaje;?>
                
                    <table class="table"> 
                    <tr class="bg-primary">
                    <th>ID</th>
                    <th>IMAGEN</th>
                    <th>NOMBRE</th>
                    <th>AUDIO</th>
                    <th>DESCRIPCION</th>
                    <th></th>
                    </tr>
<?php
	while ($audFila=$listVer->fetch(PDO::FETCH_ASSOC))
	{
		echo '<tr>
			<td>'.$audFila['id_audio'].'</td>
			<td><img src="data:image/png;base64, '.base64_encode($audFila['imagen']).'"></td>
			<td>'.$audFila['nombre'].'</td>
			<td><audio controls><source src="data:audio/mp3;base64,'.base64_encode($audFila['audio']).'"></audio controls></td>
			<td>'.$audFila['descripcion'].'</td>
			</tr>';
	}
?>
</table>
</section>
    </body>
</html>