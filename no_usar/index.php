<?php include 'header2.php'; ?>
<?php include 'conexion.php'; ?>

<?php 

#mostrar datos 
 #vamos a consultar para llenar la tabla 
 $conexion = new conexion();
 $proyectos= $conexion->consultar("SELECT * FROM `proyectos`");
 #comprobamos que la info este en forma de arreglo
 #print_r($resultado);

?>
    
<!--bs5 jum-->

<div class="p-5 bg-secondary img">
  
  
</div>


<div class="tit-5 container  text-white">
        <h1 class="tit mt-5 display-3">Hola! Soy Gisele <br></h1>
        <p class="tit-2 lead text-white">FullStack Sotware Developer Sr.</p>
        <hr class="tit-3" class="my-4">
        <p class="tit-4 text-white">Más Información</p>
       
</div>


<div class="container bg-dark">

    <h2 class="text-white" style =" font-family: 'Fjalla One', sans-serif;">Mi portfolio</h2>

    <div class ="row row-cols-1 row-cols-md-3 g-4">

    <?php #leemos proyectos 1 por 1
    foreach($proyectos as $proyecto){ ?>
        <div class="col">
            <div class="card border border-3 shadow-lg mb-5 bg-body rounded">
                <a href=""><img class="card-img-top" width="100" src="imagenes/<?php echo $proyecto['imagen'];?>" alt=""></a>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $proyecto['nombre'];?></h5>
                    <p class="card-text"><?php echo $proyecto['descripcion'];?></p>
                    
                </div>
            
            </div>
        
        </div>
    <?php } ?>
    </div>
</div>
<div>
    <form action="">

    </form>
</div>





<?php include 'footer.php'; ?>