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
function AgregarSQL( $txtNombre, $Price, $txtDescription, $txtImagen, $txtAudio, $txtVideo)
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
    $Fecha =  new DateTime();
    $nombreArchivo = ($txtImagen!="")?$Fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";
    $nombreArchivo1 =($txtAudio!="")?$Fecha->getTimestamp()."_".$_FILES["txtAudio"]["name"]:"Audio.mp3";
    $nombreArchivo2 =($txtVideo!="")?$Fecha->getTimestamp()."_".$_FILES["txtVideo"]["name"]:"Video.mp4";

    $tmpFoto = $_FILES["txtImagen"]["tmp_name"];

    if($tmpFoto!="")
    {
        move_uploaded_file($tmpFoto, "Images/".$nombreArchivo);
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

    $sentencia="INSERT INTO Products(ProductName, Price, ProductDescription, Imagen, Audio, Video ) 
                VALUES ('$txtNombre', $Price, $txtDescription, '$nombreArchivo','$nombreArchivo1','$nombreArchivo2') ";
    sqlsrv_query($conn,$sentencia);
}
function AgregarSQLTEST( $txtNombre, $Price, $txtDescription)
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
    $sentencia="INSERT INTO Products(ProductID, ProductName, Price, ProductDescription, Imagen, Audio, Video ) 
                VALUES ('36', '$txtNombre', $Price, $txtDescription, 't1', 't2', 't3') ";
    $f = sqlsrv_query($conn,$sentencia);
    print_r($f);
}