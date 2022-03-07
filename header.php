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
    <title>Portfolio</title>
</head>
<body>
<div class="container">
   
    
    <nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
    <div class="container-fluid">
       
        <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index_admin.php">Inicio</a> |
            </li>
            <li class="nav-item">
            <a class="nav-link" href="galeria.php">Galeria</a>
            </li>
            <li class="nav-item">
              
            <a class="nav-link" href="cerrar.php"><span class="bg-dark"><?php echo $_SESSION['usuario'] ?> </span>  Cerrar Sesión</a> 
            </li>
        </ul>
      
        </div>
    </div>
    </nav>