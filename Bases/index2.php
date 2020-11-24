<?php  

include ("funciones.php");

$accion=(isset($_POST['accion']))?$_POST['accion']:"";
$DatosPOSTGRES=DatosPOSTGRES();
$DatosSQL =DatosSQL();
switch ($accion) {
	case "Actualizar":
		CargarPOSTGRES($DatosSQL);
		header("Location: http://localhost/Bases/index2.php");
		break;
	case "Eliminar":
		EliminarPOSTGRES();

		$accion="";
		header("Location: http://localhost/Bases/index2.php");
		break;
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>DATA TRANSFER</title>

	<meta charset="utf-8">
    <meta name="viewport" content=" width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


	<link rel="stylesheet" href="<link rel=https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" ></script>
</head>
<body>

<div class="container p-3 my-3 border">
	<form action="" method="post">
		<input type="submit" name= "accion" value="Actualizar" class="btn btn-primary btn-lg">
		<input type="submit" name= "accion" value="Eliminar" class="btn btn-primary btn-lg">
	</form>
	<div class="row">
	<table class="table ">
		<thead>
			<tr>
				<th>Imagen</th>
				<th>Codigo</th>
				<th>Nombre</th>
				<th>Direccion</th>
				<th>Audio</th>
				<th>Video</th>
			</tr>
		</thead>
		<?php foreach($DatosPOSTGRES as $editorial){ ?>
			<tr>
				<td><img class="img-thumbnail" width="80px" src="Imagenes/<?php echo $editorial['Imagen']; ?>"/></td>
				<td><?php echo $editorial['CodEditorial']; ?></td>
				<td><?php echo $editorial['Nombre']; ?></td>
				<td><?php echo $editorial['Direccion']; ?></td>

				<td><audio style="width: 200px;" controls>
					<source src="Audio/<?php  echo $editorial['Audio'] ?>" type="audio/mpeg">
				</audio></td>
				<td> <video width="240" height="135" controls>
					  <source src="Video/<?php echo $editorial['Video']; ?>" type="video/mp4">
					</video></td>
				<td>
					<form action="" method="post">
						<input type="hidden" name="txtCodEditorial" value="<?php echo $editorial['CodEditorial']; ?>">
						<input type="hidden" required="" name="txtImagen" value="<?php echo $editorial['Imagen']; ?>">
						<input type="hidden" name="txtNombre" value="<?php echo $editorial['Nombre']; ?>">
						<input type="hidden" name="txtDireccion" value="<?php echo $editorial['Direccion']; ?>">
						<input type="hidden" name="txtAudio" value="<?php echo $editorial['Audio']; ?>">
						<input type="hidden" name="txtAudio" value="<?php echo $editorial['Video']; ?>">


					</form>
				</td>
			</tr>
		<?php } ?>
	</table>
</div>	
</div>

</body>
</html>