<?php
function DatosSQL() //: array
{
    $serverName = "PAVILION-GAMING"; //serverName\instanceName

    // Puesto que no se han especificado UID ni PWD en el array $connectionInfo,
    // La conexión se intentará utilizando la autenticación Windows.
    $connectionInfo = array( "Database"=>"productos", "CharacterSet" => "UTF-8");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
    if ( $conn ) {
        echo "";
    }else{
        echo "Conexión no se pudo establecer.<br />";
        die( print_r( sqlsrv_errors(), true));
    }
    $sentenciaSQL = "SELECT * FROM Products";

    $consultaSQL = array();
    $stmt = sqlsrv_query($conn,$sentenciaSQL);  //ejecución query


    if( $stmt === false) {    die( print_r( sqlsrv_errors(), true) ); }

    $i = 0;
    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
        $consultaSQL[$i]["ProductName"] = $row['ProductName'];
        $consultaSQL[$i]["Price"] = $row['Price'];
        $consultaSQL[$i]["ProductDescription"] = $row['ProductDescription'];
        $consultaSQL[$i]["Imagen"] = $row['Imagen'];
        $consultaSQL[$i]["Audio"] = $row['Audio'];
        $consultaSQL[$i]["Video"] = $row['Video'];
        $i++;
    }

    sqlsrv_free_stmt($stmt);	//liberación de memoria similar a flush

    return($consultaSQL);
}