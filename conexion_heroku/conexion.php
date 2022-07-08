<?php

class conexion{
    #atributos que son propios del objeto
    private $servidor ="us-cdbr-east-06.cleardb.net";
    private $usuario ="b2dfee26219027";
    private $pass = "6d7377de";
    private $conexion;#objeto de tipo pdo, de la clase propia de php
   
    public function __construct(){
        try{
            $this->conexion = new PDO("mysql:host=$this->servidor;dbname=heroku_5dc9c85290fdc82",$this->usuario,$this->pass);
            #ACTIVAMOS LOS ERRORES Y LAS EXCEPTIONES
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

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