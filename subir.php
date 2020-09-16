<?php
include('conexion.php');
if(isset($_POST['insertar']))
{
    $nombre=$_POST['nombre'];
    $cargarImagen=($_FILES['imagen']['tmp_name']);
    $imagen=fopen($cargarImagen, 'rb');
    $cargarAudio=($_FILES['audio']['tmp_name']);
    $audio=fopen($cargarAudio, 'rb');
    $descripcion=$_POST['descripcion'];

    $insertarPJ=$conexion->prepare("INSERT INTO tblaudios(nombre, imagen, audio, descripcion) VALUES(:nombre, :imagen, :audio, :descripcion)");
    $insertarPJ->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $insertarPJ->bindParam(':imagen', $imagen, PDO::PARAM_LOB);
    $insertarPJ->bindParam(':audio', $audio, PDO::PARAM_LOB);
    $insertarPJ->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
    $insertarPJ->execute();

    if($insertarPJ)
    {

        echo "<script>alert('Agregado correctamente');</script>";
    }

    else
    {
        echo "<script>alert('no se pudo agregar');</script>";
    }
}
?>
<html lang="es">
    <head>
        <title>Proyecto_Saul</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<link rel="stylesheet" href="bootstrap/css/bootst   
		<link rel="stylesheet" href="css/estilos.css">
    </head>
    <body>
        <header>
            <div>
            <h3>Cargar Podcast a la Base de Datos</h3>
            </div>
        </header>
<section>



                <form method="POST" enctype="multipart/form-data">
                    <table>
                    <tr><th colspan="5" class="bg-primary text-center" ></th></tr>
                    <tr class="bg-primary">
                    <th>IMAGEN</th>
                    <th>NOMBRE</th>
                    <th>AUDIO</th>
                    <th>DESCRIPCION</th>
                    <th></th>
                    </tr>
                    <tr class="bg-info">
                    <td><input name="imagen" type="file" class="form-control"></td>
                    <td><input name="nombre" type="text" class="form-control" placeholder="Ingrese Nombre"></td>
                    <td><input name="audio" type="file" class="form-control"></td>
                    <td><input name="descripcion" type="text" class="form-control" placeholder="Ingrese descripcion"></td>
                    <td><input name="insertar" type="submit" class="btn btn-success" value="Cargar Audio" > </td>
                    </tr>
                    </table>
                    <br>
                    <br>
                </form>
</section>
    </body>