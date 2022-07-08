<?php include 'conexion.php'; ?>

<?php 

#mostrar datos 
 #vamos a consultar para llenar la tabla 
 $conexion = new conexion();
 $proyectos= $conexion->consultar("SELECT * FROM `proyectos`");
 #comprobamos que la info este en forma de arreglo
 #print_r($resultado);

?>
   <!DOCTYPE html>
   <html lang="es">
   <head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
       <title>Portafolio</title>
     
       <script src="2d.js"></script>
       <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Comforter+Brush&family=Fjalla+One&display=swap" rel="stylesheet">  
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <style>
            body{
                width: 100%;
                overflow: visible;
                background-color:black !important;
                color: white !important; 
                
            }
         
         
        </style>
   </head>
   <body>
   <canvas style="position: absolute;top:0;left:0;z-index: -1;" id="canvas" width="1300" height="2100"></canvas>
   
   <div class="container">
       
        <div class="tit-5 container ">
          
            <h1 class="tit mt-5 display-3 animate__animated animate__flipInX" style="font-size :8rem !important;">Hola! Soy <span style="font-family: 'Comforter Brush', cursive;">Gisele,</span>   <br></h1>
            <p class="tit-2 lead animate__animated animate__flipInX" style="font-size :3rem !important; color:grey!important;">FullStack Sotfware Developer Sr.</p>
            <hr class="tit-3" class="my-4">
            <p>Más Información | <a name="" id=""   href="#contact">Contactame</a> </p>
            
       
        </div>
   </div>
   <div class="container bg-dark">
 
    <h2 class="text-white ">Mi portfolio</h2>

    <div class ="row row-cols-1 row-cols-md-3 g-4">

    <?php #leemos proyectos 1 por 1
    foreach($proyectos as $proyecto){ ?>
   
        <div class="col">
            <div class="card border border-3 shadow">
                <a href=""><img class="card-img-top" width="100" src="imagenes/<?php echo $proyecto['imagen'];?>" alt=""></a>
                <div class="card-body">
                    <h5 class="card-title text-dark"><?php echo $proyecto['nombre'];?></h5>
                    <p class="card-text text-dark"><?php echo $proyecto['descripcion'];?></p>
                    
                </div>
            
            </div>
        
        </div>
    <?php } ?>
    </div>
</div>

<div id="contact" class="container text-center">
    <header>
        <h2>Contactame</h2>
    </header>
    
    <div class="container d-flex justify-content-center">
        <div class="border-3 col-8"  >
            <form action="enviar.php" method='post' >
                    <div class="mb-3">
                        
                        <input type="text" class="form-control" id="name" placeholder="Nombre">
                        <br>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                        <br>
                        <div id="emailHelp" class="form-text">Nunca compartiremos su correo electrónico con nadie más.</div>
                    </div>
                    <div class="mb-3">
                    
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Motivo">
                        <br>
                        <textarea class="form-control" name="contenido" id="contenido" cols="10" rows="5" placeholder="Mensaje"></textarea>
                    </div>

                    
                    <button class="btn btn-light" ><a  id='WSP'  href="" Target="_blank">Enviar Whatsapp</a></button>
                    <button type="submit" class="btn btn-light"> Enviar Mail </button>
            </form>
            

        </div>
    </div>
    

</div>

   
   
    
    <footer>
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Diseñado por Gisele M.Gonzalez</a>
            </li>
           
        </ul>
    </footer>
 <script src="js.js"></script>
 <script src="envio.js"></script>
</body>
</html>
   
   
   
  
    
   
