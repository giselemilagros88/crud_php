<?php

    #inicializamos variables de sesion 
    session_start();
   # print_r($_SESSION);

    #si esta logueado lo dejo trabajar y sino lo mando al login de nuevo 
    if ( isset( $_SESSION['usuario'] )!='administrador'  ){
        header("location:login.php");
        

    }

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <link rel="stylesheet" href="estilo.css">
    
     <title>Portfolio</title>
     <style>
             .tabla{
                background-color: rgb(189, 189, 189)!important;
                }
            .color{
                background-color: rgb(189, 189, 189)!important;
                
            }


            @media screen and (max-width: 800px) {
            
                .tabla{
                    width: 80%!important;
                    font-size: 0.8em!important;
                    background-color: white!important;
                }
                .texto{
                    
                    text-overflow: clip!important;

                }
            }
                    
     </style>
</head>
<body>
<div class="container-fluid mt-5">
    <nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
        <div class="container-fluid mt-5">
        
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="index_admin.php">Ver Proyectos</a> |
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="galeria.php">ABM</a>
                    </li>
                    <li class="nav-item">
                    
                      <a class="nav-link" href="cerrar.php"><span class="bg-dark">Usuario: <?php echo $_SESSION['usuario'] ?> </span>  Cerrar Sesión</a> 
                    </li>
                </ul>
        
            </div>
        </div>
    </nav>