<?php 


$con= pg_connect("host='localhost' dbname=postgis_30_sample port=5432 user=postgres password=admin options='--client_encoding=UTF8'") or die ("Error de Conexion".pg_last_error());


if ($con) {
	print_r("");//Conexion Correcta POSTGRES<br />");
}


?>