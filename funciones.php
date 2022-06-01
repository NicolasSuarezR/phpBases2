<?php  
function DatosSQL() //: array
{
	include ("Conexion/conexion.php");
	$sentenciaSQL = "SELECT * FROM 	editoriales";

	$consultaSQL = array();
	$stmt = sqlsrv_query($conn,$sentenciaSQL);  //ejecucion query


	if( $stmt === false) {    die( print_r( sqlsrv_errors(), true) ); }

	$i = 0;
	while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
	    $consultaSQL[$i]["CodEditorial"] = $row['CodEditorial'];
	    $consultaSQL[$i]["Direccion"] = $row['Direccion'];
	    $consultaSQL[$i]["Nombre"] = $row['Nombre'];
	    $consultaSQL[$i]["Imagen"] = $row['Imagen'];
	    $consultaSQL[$i]["Audio"] = $row['Audio'];
	    $consultaSQL[$i]["Video"] = $row['Video'];
	    $i++;
	}

	sqlsrv_free_stmt($stmt);	//liberacion de memoria similar a flush

	return($consultaSQL);
}
function DatosPOSTGRES()
{
	include ("Conexion/conexionpostgres.php");
	$sentenciaPOSTGRES = "SELECT * FROM editoriales";


	$consultaPOSTGRES = array();
	$stmt1 = pg_query($con,$sentenciaPOSTGRES);
	$i = 0;

	while($row = pg_fetch_assoc($stmt1)) {
	    $consultaPOSTGRES[$i]["CodEditorial"] = $row['CodEditorial'];
	    $consultaPOSTGRES[$i]["Direccion"] = $row['Direccion'];
	    $consultaPOSTGRES[$i]["Nombre"] = $row['Nombre'];
	    $consultaPOSTGRES[$i]["Imagen"] = $row['Imagen'];
	    $consultaPOSTGRES[$i]["Audio"] = $row['Audio'];
	    $consultaPOSTGRES[$i]["Video"] = $row['Video'];
	    $i++;
	}



	return($consultaPOSTGRES); 	
}
function EliminarPOSTGRES()
{
	include ("Conexion/conexionpostgres.php");
	$sentenciaPOSTGRES = "DELETE FROM editoriales";

	$stmt1 = pg_query($con,$sentenciaPOSTGRES);
	
}
function CargarPOSTGRES($DatosSQL)
{
	include ("Conexion/conexionpostgres.php");

	foreach ($DatosSQL as $row) 
	{
		$CodEditorial=$row["CodEditorial"];
		$Direccion=$row["Direccion"];
		$Nombre=$row["Nombre"];
		$Imagen=$row["Imagen"];
		$Audio=$row["Audio"];
		$Video=$row["Video"];

		$sentenciaPOSTGRES = "INSERT INTO editoriales
	VALUES ('$CodEditorial','$Direccion','$Nombre','$Imagen','$Audio','$Video')";

		$stmt1 = pg_query($con,$sentenciaPOSTGRES);
	}
		
}


?>