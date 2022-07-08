<?php
    
    #inicializamos variables de sesion 
    session_start();
    #validar datos
    if ($_POST){
      #conexion a la base
      #mail
      #contraseña
      #es_admin s o n 
      /*
      select es_admin
      from usuarios where
      mail="" and contraseña = "";*/
        if( ($_POST['email']=="administrador@gmail.com") && ($_POST['pass']=='987g.!543FF') ){
          $_SESSION['usuario']="Admin";
          $_SESSION['logueado']='S';
          #redirecciono porque ingreso ok 
          header("location:index_admin.php");
          die();
         // exit;
        }
        else{
           echo '<script> alert("Usuario y/o Contraseña incorrecta");</script>';
           header("location:index.php");
          
           die();
        }
    }

?>
<!doctype html>
<html lang="es">
  <head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
  <div class="container">
      <div class="row">
          <div class="col-md-4">

          </div> 
          <div class="col-md-4">
          <br>
            <div class="card">
                <H1> CRUD PORTFOLIO </H1>
                <div class="card-header">
                    Iniciar Sesión
                </div>
                <div class="card-body">
                    <form action="login.php" method="post" >
                        
                        <label for="exampleInputEmail1" class="form-label">Dirección Email</label>
                        <input type="email" name ="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">Nunca compartiremos su correo electrónico con nadie más.</div>
                        
                        
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="pass" class="form-control" id="exampleInputPassword1">
                        
                        <br>
                        <button type="submit" class="btn btn-primary">Entrar al Portfolio</button>
                        
                        
                    </form>
                </div>
             
             </div>
          
        </div> 
          <div class="col-md-4">

          </div> 

      </div>
       
      </div>
      
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>