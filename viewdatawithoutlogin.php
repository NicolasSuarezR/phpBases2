<?php
    include("functions.php");

    $DatosSQL = DatosSQL();
?>
<!DOCTYPE html>
<html lang="es-CO">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Base de datos</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/material-kit.css?v=1.2.1" rel="stylesheet"/>
    <link href="stylesheet.css" rel="stylesheet">
</head>
<body class="login-page"">
    <nav class="navbar navbar-primary navbar-transparent navbar-absolute">
        <div class="container">
            <!-- Cuando se pone en modo mobile, se cambia el navbar por iconos de rayas -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Productos BD</a>
            </div>

            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="index.php" class="btn btn-primary btn-round">
                            <i class="material-icons">login</i> Iniciar sesión
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="page-header header-filter">
        <div class="container">
            <div class="table-responsive">
                <table class="table table-shopping">
                    <thead>
                        <tr>
                            <th class="text-center">Image</th>
                            <th class="text-left">Product Name</th>
                            <th class="text-left">Description</th>
                            <th>Price</th>
                            <th class="text-center">Audio/Video</th>
                            <!-- <th class="text-right">Action</th> -->
                        </tr>
                    </thead>
                    <?php foreach($DatosSQL as $producto){ ?>
                    <tbody>

                        <!-- <tr>
                            <td colspan="3">
                            </td>
                            <td class="td-total">
                                Total
                            </td>
                            <td class="td-price">
                                <small>&euro;</small>2,346
                            </td>
                            <td colspan="3" class="text-right"> <button type="button" class="btn btn-info btn-round btn-lg">Complete Purchase <i class="material-icons">keyboard_arrow_right</i></button></td>

                        </tr> -->
                        <tr>
                            <td>
                                <div class="img-container ">
                                    <img src="Images/<?php echo $producto['Imagen']?>" alt="ImagenProducto">
                                </div>
                            </td>
                            <td>
                                <?php echo $producto['ProductName']?>
                            </td>
                            <td>
                                <?php echo $producto['ProductDescription']?>
                            </td>
                            <td>
                                &dollar; <?php echo $producto['Price']?>
                            </td>
                            <td>
                                <div class="rotating-card-container manual-flip">
                                    <div class="card card-rotate">
                                        <div class="front">
                                            <div class="card-content">
                                                <h5 class="category-social text-success text-center">
                                                    <i class="material-icons">audiotrack</i> Audio
                                                </h5>
                                                <audio style="margin: 0 auto; width: 210px;" controls>
                                                    <source src="Audio/<?php  echo $producto['Audio'] ?>" type="audio/mpeg">

                                                </audio>
                                                <div class="footer text-center">
                                                    <button type="button" name="button" class="btn btn-success btn-fill btn-round btn-rotate btn-xs">
                                                        <i class="material-icons">refresh</i> Rotate...
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="back">
                                            <div class="card-content">
                                                <h5 class="category-social text-success text-center">
                                                    <i class="material-icons">movie</i> Video
                                                </h5>
                                                <video style="margin: 0 auto;" width="240" height="135" controls>
                                                    <source src="Video/<?php  echo $producto['Video'] ?>" type="video/mp4">
                                                </video>
                                                <div class="footer text-center">
                                                    <button type="button" name="button" class="btn btn-success btn-fill btn-round btn-rotate btn-xs">
                                                        <i class="material-icons">refresh</i> Rotate...
                                                    </button>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </td>
                            <!-- <td class="td-actions text-right">
                                <button type="button" rel="tooltip" class="btn btn-info btn-simple">
                                    <i class="material-icons">person</i>
                                </button>
                                <button type="button" rel="tooltip" class="btn btn-success btn-simple">
                                    <i class="material-icons">edit</i>
                                </button>
                                <button type="button" rel="tooltip" class="btn btn-danger btn-simple">
                                    <i class="material-icons">close</i>
                                </button>
                            </td> -->
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="https://github.com/Werffios">
                                Visitanos en GITHUB
                            </a>
                        </li>
                        <li>
                            <a href="https://unal.edu.co">
                                Acerca de nosotros
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright pull-right">
                    <label>
                        &copy; <script>document.write(new Date().getFullYear().toString())</script>
                        , made with <i class="material-icons">favorite</i> by Nicolás Suárez
                    </label>
                </div>
            </div>
        </footer>
    </div>
<script src="assets/js/jquery.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/material.min.js"></script>

<!--    Plugin for Date Time Picker and Full Calendar Plugin   -->
<script src="assets/js/moment.min.js"></script>

<!--	Plugin for the Sliders, full documentation here: https://refreshless.com/nouislider/   -->
<script src="assets/js/nouislider.min.js" type="text/javascript"></script>

<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker   -->
<script src="assets/js/bootstrap-datetimepicker.js" type="text/javascript"></script>

<!--	Plugin for Select, full documentation here: https://silviomoreto.github.io/bootstrap-select   -->
<script src="assets/js/bootstrap-selectpicker.js" type="text/javascript"></script>

<!--	Plugin for Tags, full documentation here: https://xoxco.com/projects/code/tagsinput/   -->
<script src="assets/js/bootstrap-tagsinput.js"></script>

<!--	Plugin for Fileupload, full documentation here: https://www.jasny.net/bootstrap/javascript/#fileinput   -->
<script src="assets/js/jasny-bootstrap.min.js"></script>

<!--    Plugin For Google Maps   -->
<script  type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

<!--    Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc    -->
<script src="assets/js/material-kit.js?v=1.2.1" type="text/javascript"></script>
</html>