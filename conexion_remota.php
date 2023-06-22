<?php

class conexion{
     #atributos que son propios del objeto
     private $servidor ="localhost";
     private $usuario ="id20947295_root";
     private $pass = 'Merlina52.';
     private $conexion;
 
    
     public function __construct(){
         #condicional de errores, manejo de excepciones
         try{
             $this->conexion = new PDO("mysql:host=$this->servidor;dbname=id20947295_proyecto",$this->usuario,$this->pass);
             #ACTIVAMOS LOS ERRORES Y LAS EXCEPTIONs
             $this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); #accedemos a un metodo de la clase pdo, que nos permite activar los errores y las excepciones(:: constante estatica)
 
         }catch(PDOException $e){
             return "Falla de Conexión".$e;
         }
     }

     #creo un metodo de ejecucion a sql de insert, update, delete   
    public function ejecutar($sql){
        #Execute una consulta de sql
        $this->conexion->exec($sql);
        #esto nos da el valor de id insertado
        return $this->conexion->lastInsertId();
    }
    public function consultar($sql){ # select 
        #ejecuta la consulta y nos devuelve la info de la base
        $sentencia = $this->conexion->prepare($sql);
        $sentencia->execute();
        #retorna todos los registros de la consulta sql
        return $sentencia->fetchAll();
    }


}

?>