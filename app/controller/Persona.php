<?php

class Persona extends Control {

	public function __construct(){
        $this->tipo_doc = $this->modelar('TipodocumentoModel'); 
		$this->persona = $this->modelar('PersonaModel');	

	}
    
    public function index($id=null)
    {
        $this->perfil();
    }

   

    public function perfil()
    {
        //secho "has ingresado vien ";
        if(!is_null($_SESSION["documento"])){
            $rol=$this->persona->rol($_SESSION["documento"]);
            $_SESSION["rol"]=$rol->fk_tipo_rol;
            switch ($rol->fk_tipo_rol) {
            case 1:
            include RUTA_APP.'/view/paginas/cuerpo/nav3.php';
            include RUTA_APP.'/view/paginas/cuerpo/perfil_admin.php';
            break;
            case 2:
            include RUTA_APP.'/view/paginas/cuerpo/nav3.php';
            include RUTA_APP.'/view/paginas/cuerpo/perfil_apoyo_admin.php';
            break;
            case 3:
             include RUTA_APP.'/view/paginas/cuerpo/nav2.php';
            include RUTA_APP.'/view/paginas/cuerpo/perfil_instructor.php';
            break;
            case 4:
             include RUTA_APP.'/view/paginas/cuerpo/nav4.php';
            include RUTA_APP.'/view/paginas/cuerpo/perfil.php';
            break;
            default:
            header('location:'.RUTA_URL);
            break;
            }
        }else{
            header('location:'.RUTA_URL);
        }
    }  

    public function salir()
    {
        $_SESSION["rol"]=null;
        $_SESSION["documento"]=null;
        $_SESSION["fk_tipo_documento"]=null;
        $_SESSION["nombre"]=null;
        header('location:index.php');

    }


    
    public function password(){
        $this->cargarFormulario('/password');
    }
    public function cambiarContra()
    {
        if($_POST["contrasena1"]==$_POST["contrasena2"]){
            $datosController = array( 'documento' =>$_SESSION["documento"]);
            $respuesta = $this->persona->ingresarModel($datosController);

            if ($respuesta->contrasena==md5($_POST["contrasena"])) {
            $datos = array(
                'contrasena' =>md5($_POST['contrasena2']) , 
                'documento' =>$_SESSION['documento'] , 
            );

                $stm=$this->persona->cambiarContraModel($datos);
                 echo $stm; 
            }else {
                echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Atención!</strong> La contraseña no coincide con la informacion del perfil.
                  </div>';            
            }  
        }else{
            echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Atención!</strong> Las contraseñas no coinciden. </div>';
        }
    
    }

    

}
?>