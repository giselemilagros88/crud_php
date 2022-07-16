<?php include 'header.php'; 
if($_GET){
    if(isset($_GET['modificar'])){
        $id = $_GET['modificar'];
       
        $_SESSION['id_proyecto'] = $id;
        #vamos a consultar para llenar la tabla 
        $conexion = new conexion();
        $proyecto= $conexion->consultar("SELECT * FROM `proyectos` where id=".$id);
     
    }
}
if($_POST){
    $id = $_SESSION['id_proyecto'];
    #debemos recuperar la imagen actual y borrarla del servidor para lugar pisar con la nueva imagen en el server y en la base de datos
    #recuperamos la imagen de la base antes de borrar 
    $imagen = $conexion->consultar("select imagen FROM  `proyectos` where id=".$id);
    #la borramos de la carpeta 
    unlink("imagenes/".$imagen[0]['imagen']);
    #levantamos los datos del formulario
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
    #creo una instancia(objeto) de la clase de conexion
    $conexion = new conexion();
    $sql = "UPDATE `proyectos` SET `nombre` = '$nombre_proyecto' , `imagen` = '$imagen', `descripcion` = '$descripcion' WHERE `proyectos`.`id` = '$id';";
    $id_proyecto = $conexion->ejecutar($sql);

    header("location:galeria.php");
    die();
}
?>
<?php #leemos proyectos 1 por 1
  foreach($proyecto as $fila){ ?>
    <div class="row d-flex justify-content-center mt-4 mb-5">
            <div class="col-md-10 col-sm-12">
                <div class="card" style="background-color:#CDB3A6;">
                    <div class="card-header">
                        Datos del Proyecto
                    </div>
                    <div class="card-body">
                        <!--para recepcionar archivos uso enctype-->
                        <form action="#" method="post" enctype="multipart/form-data">
                            <div>
                                <label for="nombre">Nombre del Proyecto</label>
                                <input required class="form-control" type="text" name="nombre" id="nombre" value="<?php echo $fila['nombre']; ?>">
                            </div>
                        
                            <div>
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <label for="archivo">Imagen del Proyecto - Se actualizara al grabar los cambios</label>
                                    <br>
                                    <div class="d-flex justify-content-center align-item-center">
                                        <img class="img__modificar" src="imagenes/<?php echo $fila['imagen']; ?>">
                                    </div>
                                </div>
                                <p>Seleccione un nueva Imagen si desea modificar</p>
                                <input class="form-control" type="file" name ="archivo" id="archivo" value="<?php echo $fila['imagen'];?>">
                            </div>
                            <br>
                            <div>
                                <label for="descripcion">Indique Descripción del Proyecto</label>
                                <textarea required class="form-control" name="descripcion" id="descripcion" cols="30" rows="4"><?php echo $fila['descripcion'];?></textarea>
                            </div>
                            <div>
                            <br>
                            <input class="btn btn-warning" type="submit" value="Modificar Proyecto">
                            </div>
                    
                        </form>
                    </div> <!--cierra el body-->
        
                </div><!--cierra el card-->
                
            </div><!--cierra el col-->
        </div><!--cierra el row-->
        <?php #cerramos la llave del foreach
                        } ?>

<?php include 'footer.php'; ?>