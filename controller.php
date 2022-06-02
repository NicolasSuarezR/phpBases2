<?php
    require_once 'model.php';

    //instanciamos Model
    $model = new Model();

    $model->usuario=$_POST['txtUsuario'];
    $model->clave=$_POST['txtClave'];

    $filaController=$model->Logear();

    if ($filaController>0)
    {
        echo "<h1>Bienvenido<h1>";

    }else{
        echo "<h1>Error</h1>";

        header("refresh:2; url=http://localhost:63342/phpBases2/index.php?_ijt=s64vahlfqh6gdvua74pgbvhssp&_ij_reload=RELOAD_ON_SAVE#");
    }
?>