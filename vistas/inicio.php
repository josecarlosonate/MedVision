<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <meta name="title" content="pruena ">

    <meta name="description" content="realizacion de prueba medvision ">

    <meta name="keyword" content="prueba Medvision, php">

    <title>MEDVISION</title>

    <!--=====================================
	HOJA DE CSS 
	======================================-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="vistas/css/plugins/bootstrap4.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="vistas/css/estilo.css">



</head>

<body>
    <div class="container">
        <div class="centrar">
            <img src="vistas/img/bienvenido.svg" class="img-fluid" alt="bienvenida">
            <div>
                <h2 class="text-center">Bienvenid@</h2>

            </div>
        </div>
        <div class="card">
            <div class="card-header">
                Medvision
            </div>
            <div class="card-body">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Personas</a>
                        <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Casas</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-header">
                                    Listado de Personas registradas
                                    <a class="btn btn-outline-success float-right" data-toggle="modal" data-target="#Modal">
                                        <i class="fa fa-user-plus"></i> Nueva Persona
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php
                            //traer personas
                            $personas = ControladorPersonas::ctrMostrarPersonas();
                            $arrPersonas = json_decode($personas, true);
                            foreach ($arrPersonas as $key => $value) {
                            ?>
                                <div class="col-md-4">
                                    <div class="card" style="width: 18rem; margin-top:10px">
                                        <img src="vistas/img/user.png" id="img<?php echo $key ?>" class="card-img-top imgPersona" alt="...">
                                        <div class="card-body">
                                            <div class="card-body">
                                                <h5 class="card-title nombrePersona" id="nom<?php echo $key ?>"><?php echo $value['fisrstName'] . ' ' . $value["lastName"] ?></h5>
                                                <div class="" id="caja<?php echo $key ?>">
                                                    <ul>
                                                        <li>Cumpleaños: <?php echo date("d/m/Y", strtotime($value['birthDate']))  ?></li>
                                                        <li>Casado: <?php echo $value['isMarried'] == true ? 'Si' : 'No' ?></li>
                                                    </ul>
                                                    <h5 class="card-title" style="margin:0px; padding:0px">Casa</h5>
                                                    <ul>
                                                        <li><?php echo $value['houses'][0]['description'] ?></li>
                                                        <li style="font-size: 15px;"><?php echo $value['houses'][0]['address'] ?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <p class="text-center">Actualmente en construcción</p>
                        <img src="vistas/img/not.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <!-- Modal Persona -->
    <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear nueva Persona</h5>
                    <button type="button" id="btnCerrarM" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" id="formularioRegistro">
                    <div class="modal-body">
                        <h6 class="text-danger">los campos marcados con * son obligatorios</h6>
                        <!-- nombre  -->
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Nombre completo <b class="text-danger"> *</b></span>
                            </div>
                            <input type="text" id="nombre" name="nombre" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <!-- casado  -->
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">¿Casado? <b class="text-danger"> *</b></span>
                            </div>
                            <select name="casado" id="casado" class="form-control" aria-describedby="basic-addon1">
                                <option value="1">Si</option>
                                <option value="1">No</option>
                            </select>
                        </div>
                        <!-- cumpleaños  -->
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Fecha Cumpleaños <b class="text-danger"> *</b></span>
                            </div>&nbsp;&nbsp;
                            <input type="date" name="fecha" class="form-control" aria-describedby="basic-addon1" id="fecha">
                        </div>                      
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnGuardar" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!--=====================================
	PLUGINS DE JAVASCRIPT
	======================================-->

    <script src="https://kit.fontawesome.com/2c9eef3e53.js" crossorigin="anonymous"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script src="vistas/js/plugins/jquery.validate.min.js"></script>

    <!--=====================================
    MI JAVASCRIPT
    ======================================-->

    <script src="vistas/js/admin.js"></script>

</body>

</html>