<?php ob_start(); ?>
<?php session_start();
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
        if( ($_POST['email']=="administrador") && ($_POST['pass']=='cac') ){
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
    }?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>

   <style>
       @import url('https://fonts.googleapis.com/css2?family=Comforter+Brush&family=Dongle&family=Fjalla+One&family=Lato:ital@1&family=Montserrat:wght@300&family=Palette+Mosaic&family=Poppins:ital,wght@0,400;0,600;0,700;1,700&family=Roboto:wght@300&family=The+Nautigal:wght@700&display=swap');
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Montserrat, sans-serif;
        }

        body{
            height: 100vh;
            width: 100%;
        }
        .container{
            position:relative;
            width: 100%;
            height: 100%;
            display:flex;   
            justify-content: center;
            align-items: center;
            padding: 20px 100px;
        }
        .container::after{
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background-image: url("img/crud.jpg");
            background-repeat: no-repeat;
            background-position: center;
            filter:blur(50px);
            z-index: -1;
           
            background-color: rgba(0,0,0,0.5);
        }
        .contact-box{
            max-width: 850px;
            display:grid;
            grid-template-columns: 1fr 1fr;
            justify-content: center;
            align-items: center;
            text-align: center;
            background-color: #fff;
            box-shadow: 0px 0px 19px 5px rgba( 0, 0, 0, 0.19 );

        }
        .left{
            background: url("img/crud.jpg") no-repeat center;
            background-size: cover;
            height: 100%;
        }
        .right{
            padding: 25px 40px;

        }
        h2{
            position: relative;
            padding: 0 0 10px;
            margin-bottom: 10px;
        }
        h2::after{
            content: '';
            position: absolute;
            left: 50%;
            bottom: 0;
            transform: translateX(-50%);
            height: 4px;
            width: 50px;
            border-radius: 2px;
         
            background-color:#9A3C0D ;
   
        }
        .field{
            width: 100%;
            border: 2px solid rgba(0, 0, 0, 0.184);
            outline:none;
            background-color: #F9A67D;
            padding: 0.5rem 1rem;
            font-size: 1.1rem;
            margin-bottom: 22px;
            transition: all 0.3s ease-in-out;
        }
        .field:hover{
            background-color: rgba(0,0,0,0.1);

        }
        textarea{
            min-height: 150px;
        }
        .btn{
            width: 100%;
            padding: 0.5rem 1rem;
            background-color:#9A3C0D;
            color: #fff;
            font-size: 1.1rem;
            border: none;
            outline:none;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }
        .btn:hover{
            background-color: #F9A67D;
        }
        .field:focus{
            border: 2px solid #9A3C0D;
            background-color: #fff;
        }

        @media screen and (max-width: 880px){
         
          .container{
           
            padding: 20px;  
          }
         
            .contact-box{
                grid-template-columns: 1fr;
            }
            .left{
                background-size: cover;
                height: 100%;
            }
            .right{
                padding: 25px 20px;
            }
        }
            
       
   </style>
     
    
</head>
<body>
    <div class="container">
        <div class="contact-box">
            <div class="left"></div>
            <div class="right">
                <h2>Crud PortFolio</h2>
                <form action="login.php" method="post">
                    <input type="text" name="email" id="email" class="field" placeholder="Usuario" required>
                    <input type="password" name="pass" id="subject" class="field" placeholder="Password" required>
                   
                    <input type="submit" value="Enviar" class="btn">
                  
                </form>
        </div>
    </div>
    
</body>
</html>