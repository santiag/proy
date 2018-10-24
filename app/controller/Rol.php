<?php
class Rol extends Control{

    function __construct(){
        $this->rol= $this->modelar('RolModel'); 
    }
    
    public function asignarrol()
    {
        $datos=array(
            'rol' =>$_POST['rol'],
            'documento' =>$_POST['documento'],
            );
            $stm=$this->asignarrolModel($datos);
            echo $stm;
    }

    public function agregar(){
        $rol = $this->rol->all();
        $documentos = $this->rol->alld();
        $this->cargarformulario('/rol', $rol,$documentos);
    }
    

}

?>