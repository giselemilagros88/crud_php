<?php include 'header.php'; ?>
<?php 
  include 'api-google/vendor/autoload.php';
  putenv('GOOGLE_APPLICATION_CREDENTIALS=cargar-archivos-356516-098024b3d335.json');
  $client = new Google_Client();
  $client->useApplicationDefaultCredentials();
  $client->SetScopes(['https://www.googleapis.com/auth/drive.file']);

 ?>
<?php if($_POST){#si hay envio de datos, los inserto en la base de datos  

    $nombre_proyecto = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    #nombre de la imagen
    $imagen = $_FILES['archivo']['name'];
    #tenemos que guardar la imagen en una carpeta 
    $imagen_temporal=$_FILES['archivo']['tmp_name'];
    #creamos una variable fecha para concatenar al nombre de la imagen, para que cada imagen sea distinta y no se pisen 
    $fecha = new DateTime();
    $imagen= $fecha->getTimestamp()."_".$imagen;
    move_uploaded_file($imagen_temporal,"imagenes/".$imagen);
    /*
    try{
        $service = new Google_Service_Drive($client);
        $file_path = $imagen;
        $file = new Google_Service_Drive_DriveFile();
        $file->setName($imagen);
        $file->setParents(array("1LAzAw7LAbN-ePTGstC1lVIR9-qFIeDeT"));
        $file->setDescription($imagen."_cargado desde la web");
        $file->setMimeType('image/jpg');
        $resultado = $service->files->create(
            $file,
            array(
                'data' => file_get_contents($file_path),
                'mimeType' => 'image/jpg',
                'uploadType' => 'media'
            )
       
        );
        #echo '<a href="www.google.com/drive/folders/'.$resultado->id.'">'.$resultado->id.'</a>';
    }
    catch(Google_Service_Exception $gs){
        $mensaje = json_decode($gs->getMessage());
        echo $mensaje->error->message();
    }catch(Exception $e){
        echo $e->getMessage();
    }*/
   
    #creo una instancia(objeto) de la clase de conexion
    $conexion = new conexion();
    $sql="INSERT INTO `proyectos` (`id`, `nombre`, `imagen`, `descripcion`) VALUES (NULL, '$nombre_proyecto' , '$imagen', '$descripcion')";
    $id_proyecto = $conexion->ejecutar($sql);
     #para que no intente borrar muchas veces
     header("Location:galeria.php");
     die();

 }
 #si nos envian por url, get 
 if($_GET){

    #ademas de borrar de la base , tenemos que borrar la foto de la carpeta imagenes
   if(isset($_GET['borrar'])){
        $id = $_GET['borrar'];
        $conexion = new conexion();

        #recuperamos la imagen de la base antes de borrar 
        $imagen = $conexion->consultar("select imagen FROM  `proyectos` where id=".$id);
        #la borramos de la carpeta 
        unlink("imagenes/".$imagen[0]['imagen']);

        #borramos el registro de la base 
        $sql ="DELETE FROM `proyectos` WHERE `proyectos`.`id` =".$id; 
        $id_proyecto = $conexion->ejecutar($sql);
         #para que no intente borrar muchas veces
         header("Location:galeria.php");
         die();
 }

   if(isset($_GET['modificar'])){
        $id = $_GET['modificar'];
        header("Location:modificar.php?modificar=".$id);
        die();
    }
 } 
  #vamos a consultar para llenar la tabla 
  $conexion = new conexion();
  $proyectos= $conexion->consultar("SELECT * FROM `proyectos`");
?> 

<br>
<!--ya tenemos un container en el header que cierra en el footer-->

    <div class="row d-flex justify-content-center mb-5">
        <div class="col-md-10 col-sm-12">
            <div class="card" style="background-color:#CDB3A6;">
                <div class="card-header">
                    Datos del Proyecto
                </div>
                <div class="card-body">
                    <!--para recepcionar archivos uso enctype-->
                    <form action="galeria.php" method="post" enctype="multipart/form-data">
                        <div>
                            <label for="nombre">Nombre del Proyecto</label>
                            <input required class="form-control" type="text" name="nombre" id="nombre">
                        </div>
                    
                        <div>
                            <label for="archivo">Imagen del Proyecto</label>
                            <input required class="form-control" type="file" name ="archivo" id="archivo">
                        </div>
                        <br>
                        <div>
                            <label for="descripcion">Indique Descripción del Proyecto</label>
                            <textarea required class="form-control" name="descripcion" id="descripcion" cols="30" rows="4"></textarea>
                        </div>
                        <div>
                        <br>
                        <input class="btn btn-success" type="submit" value="Enviar Proyecto">
                        </div>
                
                    </form>
                </div> <!--cierra el body-->
    
            </div><!--cierra el card-->
            
        </div><!--cierra el col-->
    </div><!--cierra el row-->
    <div style="background-color:#CDB3A6;">
        <div class="row d-flex justify-content-center mb-5">
            <div class="col-md-10 col-sm-6">
                <table class="table tabla__galeria" style="background-color:#CDB3A6;">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Imagen</th>
                            <th>Descripcion</th>
                            <th>Eliminar</th>
                            <th>Modificar</th>
                        </tr>
                    </thead>
                    <tbody >
                        <?php #leemos proyectos 1 por 1
                        foreach($proyectos as $proyecto){ ?>
                    
                        <tr >
                            <!--<td scope="row"><?php #echo $proyecto['id'];?></td> -->
                            <td><?php echo $proyecto['nombre'];?></td>
                            <td> <img width="200" src="imagenes/<?php echo $proyecto['imagen'];?>" alt="">  </td>
                            <td class="texto"><?php echo $proyecto['descripcion'];?></td>
                            <td><a name="eliminar" id="eliminar" class="btn btn-danger" href="?borrar=<?php echo $proyecto['id'];?>">Eliminar</a></td>
                            <td><a name="modificar" id="modificar" class="btn btn-warning" href="?modificar=<?php echo $proyecto['id'];?>">Modificar</a></td>
                        </tr>

                        <?php #cerramos la llave del foreach
                        } ?>
                    </tbody>
                </table>
                <h2 class="card-title text-dark card__mobile">Listado de proyectos ingresados: </h2>
                <?php #leemos proyectos 1 por 1
                 foreach($proyectos as $proyecto){ ?>
                    <div class="col card__mobile  mb-4">
                        <div class="card border border-3 shadow w-100">
                            <h3 class="card-title text-dark"><?php echo $proyecto['nombre'];?></h3>
                            <a>
                                <img class="card-img-top" width="200" src="imagenes/<?php echo $proyecto['imagen'];?>" alt="">
                            </a>
                            <div class="card-body">
                               
                                <p class="card-text text-dark"><?php echo $proyecto['descripcion'];?></p>
                                <a name="eliminar" id="eliminar" class="btn btn-danger" href="?borrar=<?php echo $proyecto['id'];?>">Eliminar</a>
                                <a name="modificar" id="modificar" class="btn btn-warning" href="?modificar=<?php echo $proyecto['id'];?>">Modificar</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div><!--cierra el col-->  
            
        </div>
    </div>
   
<?php include 'footer.php'; ?>