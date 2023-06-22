<?php ob_start(); #esto evita los errores de envios de headers
set_error_handler("var_dump");
include 'conexion.php';
session_start(); #inicializamos variables de sesion
 #si esta logueado lo dejo trabajar y sino lo mando al login de nuevo 
 if ( isset( $_SESSION['usuario'] )!='Admin'){
    header("location:login.php");
    die();
} ?>
<!DOCTYPE html>
<html lang="es">
<head>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comforter+Brush&family=Dongle&family=Edu+VIC+WA+NT+Beginner:wght@500&family=Fjalla+One&family=Lato:ital@1&family=Montserrat:wght@300&family=Oswald:wght@200&family=Poppins:ital,wght@0,400;0,600;0,700;1,700&family=Roboto:wght@300&family=The+Nautigal:wght@700&family=Updock&display=swap&family=Edu+SA+Beginner:wght@500" rel="stylesheet">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <link rel="stylesheet" href="estilo.css">
     <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
     <title>Portfolio</title>
     <style>
            *{
                margin: 0; 
                padding: 0; 
                box-sizing: border-box;
            }
            p{
                font-family: 'Edu SA Beginner', cursive;
            }
            label{
                font-family: 'Edu SA Beginner', cursive;
                font-size: 1.2rem;
            }

            .tabla{
                background-color: rgb(189, 189, 189)!important;
                }
            .color{
                background-color: rgb(189, 189, 189)!important;
                
            }
            .img__modificar{
                width: 400px!important;
            }
            .card__mobile{
                display:none!important;
            }


            @media screen and (max-width: 800px) {
            
                .tabla{
                    width: 80%!important;
                    font-size: 0.8em!important;
                    
                }
                .texto{
                    text-overflow: clip!important;
                    
                }
                .img__modificar{
                    width: 300px!important;
                 }
                .tabla__galeria{
                    display:none!important;
                }
                .card__mobile{
                     display:block!important;
                }
            }
                    
     </style>
</head>
<body>
<div class="container-fluid">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2">
                    <li class="nav-item">
                        <div class="p-3 d-flex ">
                            <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
                            <lord-icon
                                src="https://cdn.lordicon.com/igpbsrza.json"
                                trigger="loop"
                                delay="1000"
                                colors="primary:#FFFFFF"
                                style="width:50px;height:50px;">
                                
                            </lord-icon>
                            <a class="nav-link active" aria-current="page"  href="index_admin.php">Ver proyectos</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="p-3 d-flex ">
                            <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
                            <lord-icon
                            src="https://cdn.lordicon.com/stxtcyyo.json"
                            trigger="loop"
                            delay="1000"
                            colors="primary:#FFFFFF"
                            style="width:50px;height:50px">
                            </lord-icon>
                            <a class="nav-link active" aria-current="page"  href="galeria.php">Abm</a>
                        </div>
                   
                    </li>
                    <li class="nav-item">
                        <div class="p-3 d-flex ">
                            <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
                            <lord-icon
                                src="https://cdn.lordicon.com/becxqsdr.json"
                                trigger="loop"
                                delay="1000"
                                colors="primary:#FFFFFF"
                                style="width:50px;height:50px">
                            </lord-icon>
                            <a class="nav-link active" href="cerrar.php">Cerrar Sesión de User: <span><?php echo $_SESSION['usuario']; ?></span>  </a> 
                        </div>
                   
                    </li>
                
                </ul>
            
            </div>
        </div>
    </nav>
   