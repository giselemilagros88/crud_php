<?php include 'header.php'; ?>
<?php include 'conexion.php'; ?>

<?php 

#mostrar datos 
 #vamos a consultar para llenar la tabla 
 $conexion = new conexion();# es un objeto de tipo conexion,
 
 $proyectos= $conexion->consultar("SELECT * FROM `proyectos`");
 #comprobamos que la info este en forma de arreglo
 #print_r($resultado);

?>


    
<!--bs5 jum-->
<div class="p-5 bg-light">
    <div class="container">
        <h1 class="display-3">Bienvenido</h1>
        <p class="lead">Portfolio de ...</p>
        <hr class="my-2">
        <p>Más Información</p>
       
    </div>
</div>


<div class ="row row-cols-1 row-cols-md-3 g-4">

<?php #leemos proyectos 1 por 1
 foreach($proyectos as $proyecto){ ?>
    <div class="col">
        <div class="card">
            <img class="card-img-top" width="100" src="imagenes/<?php echo $proyecto['imagen'];?>" alt="">
           
            <div class="card-body">
            <h5 class="card-title"><?php echo $proyecto['nombre'];?></h5>
            <p class="card-text"><?php echo $proyecto['descripcion'];?></p>
            </div>
          
        </div>
    
    </div>
 <?php } ?>
</div>

<?php include 'footer.php'; ?>
