<?php

$txtCodEditorial = (isset($_POST['txtCodEditorial']))?$_POST['txtCodEditorial']:"";
$txtDireccion = (isset($_POST['txtDireccion']))?$_POST['txtDireccion']:"";
$txtNombre = (isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtImagen = (isset($_FILES['txtImagen']["name"]))?$_FILES['txtImagen']:"";
$txtAudio = (isset($_FILES['txtAudio']["name"]))?$_FILES['txtAudio']:"";
$txtVideo = (isset($_FILES['txtVideo']["name"]))?$_FILES['txtVideo']:"";

$accion=(isset($_POST['accion']))?$_POST['accion']:"";

include ("Conexion/conexion.php");

switch ($accion) {
	case 'btnAgregar':


		$Fecha =  new DateTime();
		$nombreArchivo =($txtImagen!="")?$Fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";
		$nombreArchivo1 =($txtAudio!="")?$Fecha->getTimestamp()."_".$_FILES["txtAudio"]["name"]:"Audio.mp3";
		$nombreArchivo2 =($txtVideo!="")?$Fecha->getTimestamp()."_".$_FILES["txtVideo"]["name"]:"Video.mp4";

		$tmpFoto = $_FILES["txtImagen"]["tmp_name"];

		if($tmpFoto!="")
		{
			move_uploaded_file($tmpFoto, "Imagenes/".$nombreArchivo);
		}

		$tmpAudio = $_FILES["txtAudio"]["tmp_name"];

		if($tmpAudio!="")
		{
			move_uploaded_file($tmpAudio, "Audio/".$nombreArchivo1);
		}

		$tmpVideo = $_FILES["txtVideo"]["tmp_name"];

		if($tmpVideo!="")
		{
			move_uploaded_file($tmpVideo, "Video/".$nombreArchivo2);
		}

		$sentencia="INSERT INTO editoriales(CodEditorial,Direccion,Nombre,Imagen,Audio,Video) VALUES ('$txtCodEditorial','$txtDireccion','$txtNombre','$nombreArchivo','$nombreArchivo1','$nombreArchivo2') ";

		$ejecutar = sqlsrv_query($conn,$sentencia);
		break;

	case 'btnModificar':
		$sentencia="UPDATE editoriales SET
		Direccion = '$txtDireccion',
		Nombre = '$txtNombre'
		WHERE  CodEditorial = '$txtCodEditorial'";

		$ejecutar = sqlsrv_query($conn,$sentencia);

		$Fecha =  new DateTime();
		$nombreArchivo = ($txtImagen!="")?$Fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";
		$nombreArchivo1 =($txtAudio!="")?$Fecha->getTimestamp()."_".$_FILES["txtAudio"]["name"]:"Audio.mp3";
		$nombreArchivo2 =($txtVideo!="")?$Fecha->getTimestamp()."_".$_FILES["txtVideo"]["name"]:"Video.mp4";

		$tmpFoto = $_FILES["txtImagen"]["tmp_name"];

		if($tmpFoto!="")
		{
			$sentencia="SELECT Imagen FROM editoriales
			WHERE  CodEditorial = '$txtCodEditorial'";
			$ejecutar = sqlsrv_query($conn,$sentencia);
			$del = sqlsrv_fetch_array( $ejecutar, SQLSRV_FETCH_ASSOC);
			//print_r($del);

			if (isset($del["Imagen"])) {
				if (file_exists("Imagenes/".$del["Imagen"])) {
					unlink("Imagenes/".$del["Imagen"]);
				}
			}
			move_uploaded_file($tmpFoto, "Imagenes/".$nombreArchivo);
			$sentencia="UPDATE editoriales SET
			Imagen = '$nombreArchivo'
			WHERE  CodEditorial = '$txtCodEditorial'";
			$ejecutar = sqlsrv_query($conn,$sentencia);
		}

		$tmpAudio = $_FILES["txtAudio"]["tmp_name"];
		if($tmpAudio!="")
		{
			$sentencia="SELECT Audio FROM editoriales
			WHERE  CodEditorial = '$txtCodEditorial'";
			$ejecutar = sqlsrv_query($conn,$sentencia);
			$del = sqlsrv_fetch_array( $ejecutar, SQLSRV_FETCH_ASSOC);
			//print_r($del);

			if (isset($del["Audio"])) {
				if (file_exists("Audio/".$del["Audio"])) {
					unlink("Audio/".$del["Audio"]);
				}
			}
			move_uploaded_file($tmpAudio, "Audio/".$nombreArchivo1);
			$sentencia="UPDATE editoriales SET
			Audio = '$nombreArchivo1'
			WHERE  CodEditorial = '$txtCodEditorial'";
			$ejecutar = sqlsrv_query($conn,$sentencia);
		}

		$tmpVideo = $_FILES["txtVideo"]["tmp_name"];

		if($tmpVideo!="")
		{
			$sentencia="SELECT Video FROM editoriales
			WHERE  CodEditorial = '$txtCodEditorial'";
			$ejecutar = sqlsrv_query($conn,$sentencia);
			$del = sqlsrv_fetch_array( $ejecutar, SQLSRV_FETCH_ASSOC);
			//print_r($del);

			if (isset($del["Video"])) {
				if (file_exists("Video/".$del["Video"])) {
					unlink("Video/".$del["Video"]);
				}
			}
			move_uploaded_file($tmpVideo, "Video/".$nombreArchivo1);
			$sentencia="UPDATE editoriales SET
			Video = '$nombreArchivo2'
			WHERE  CodEditorial = '$txtCodEditorial'";
			$ejecutar = sqlsrv_query($conn,$sentencia);
		}
		break;
	case 'btnEliminar':
		$sentencia="SELECT Imagen FROM editoriales
		WHERE  CodEditorial = '$txtCodEditorial'";
		$ejecutar = sqlsrv_query($conn,$sentencia);
		$del = sqlsrv_fetch_array( $ejecutar, SQLSRV_FETCH_ASSOC);
		//print_r($del);

		if (isset($del["Imagen"])) {
			if (file_exists("Imagenes/".$del["Imagen"])) {
				unlink("Imagenes/".$del["Imagen"]);
			}
		}
		$sentencia="DELETE FROM editoriales
		WHERE  CodEditorial = '$txtCodEditorial'";

		$ejecutar = sqlsrv_query($conn,$sentencia);
		break;

	case 'btnCancelar':
		# code...
		break;
}

$listae = array();
$sentencia= "SELECT * FROM 	editoriales";
$stmt = sqlsrv_query($conn,$sentencia);
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

$i = 0;
while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
    $listae[$i]["CodEditorial"] = $row['CodEditorial'];
    $listae[$i]["Direccion"] = $row['Direccion'];
    $listae[$i]["Nombre"] = $row['Nombre'];
    $listae[$i]["Imagen"] = $row['Imagen'];
    $listae[$i]["Audio"] = $row['Audio'];
    $listae[$i]["Video"] = $row['Video'];
    $i++;
}

sqlsrv_free_stmt($stmt);
//print_r( $listae);


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content=" width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
	<title>Bases SQL-PHP</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


	<link rel="stylesheet" href="<link rel=https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" ></script>

</head>
	<body>
		<div class="container">
			<form action="" method="post" enctype="multipart/form-data">
				<!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Nueva Editorial</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        <div class="form-row">
				        		<label for="">Codigo:</label>
				        		<input type="text"class="form-control" required name="txtCodEditorial" value="<?php echo $txtCodEditorial;?>" placeholder="" id="txtCodEditorial" required="">

								<label for="">Nombre:</label>
								<input type="text" class="form-control" required name="txtNombre" value="<?php echo $txtNombre;?>" placeholder="" id="txtNombre" required="">
								<br>

								<label for="">Direccion:</label>
								<input type="text" class="form-control" required name="txtDireccion" value="<?php echo $txtDireccion;?>" placeholder="" id="txtDireccion" required="">
								<br>

								<label for="">Imagen:</label>
								<input type="file" class="form-control" required accept="image/*"  name="txtImagen" value="<?php echo $txtImagen;?>" placeholder="" id="txtImagen" >
								<br>
								<label for="">Audio:</label>
								<input type="file" class="form-control" required accept="audio/*"  name="txtAudio" value="<?php echo $txtAudio;?>" placeholder="" id="txtAudio" >
								<br>

								<label for="">Video:</label>
								<input type="file" class="form-control" required accept="video/*"  name="txtVideo" value="<?php echo $txtVideo;?>" placeholder="" id="txtVideo" >
								<br>
				        </div>
				      </div>
				      <div class="modal-footer">

							<button value="btnAgregar" class="btn btn-secondary " type="submit" name="accion">Agregar</button>
							<div class="btn-group" role="group" aria-label="Basic example"> 
								<button value="btnModificar" class="btn btn-secondary " type="submit" name="accion">Modificar</button>
								<button value="btnEliminar" class="btn btn-secondary " type="submit" name="accion">Eliminar</button>
								<button value="btnCancelar" class="btn btn-secondary " type="submit" name="accion">Cancelar</button>
							</div> 

				      </div>
				    </div>
				  </div>
				</div>
				<!-- Button trigger modal -->
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
				  Agregar +
				</button> <!--Boton que activa el modal*/    -->

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
							<th>Acciones</th>
						</tr>
					</thead>
				<?php foreach($listae as $editorial){ ?>
					<tr>
						<td><img class="img-thumbnail" width="240px" src="Imagenes/<?php echo $editorial['Imagen']; ?>"/></td>
						<td><?php echo $editorial['CodEditorial']; ?></td>
						<td><?php echo $editorial['Nombre']; ?></td>
						<td><?php echo $editorial['Direccion']; ?></td>

						<td><audio controls>
							<source src="Audio/<?php  echo $editorial['Audio'] ?>" type="audio/mpeg">
						</audio></td>
						<td> <video width="144" height="81" controls>
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
								<input type="submit" name= "accion" value="Seleccionar" class="btn btn-outline-primary btn-lg">
								<button value="btnEliminar" type="submit" name="accion" class="btn btn-outline-primary btn-lg">Eliminar</button></td>
							</form>
						</td>
					</tr>
				<?php } ?>
				</table>
			</div>
		</div>
	</body>
</html>
