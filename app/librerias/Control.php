
               
<?php require RUTA_APP.'/view/inc/header.php';  ?>

<?php
	//clase de control
    class Control{
        //cargar modelo
        public function modelar($modelo){
            require_once("../app/model/".$modelo.".php");
            return new $modelo();

        }
        public function cargarvista($vista,$datos=[]){
            if(file_exists("../app/view/paginas/cuerpo/".$vista.".php")){
            require_once("../app/view/paginas/cuerpo/".$vista.".php");
            require RUTA_APP.'/view/inc/footer.php';
            }else{
                die("no existe el archivo");
            }
            // echo $vista;
        }

        public function cargarFormulario($vista,$datos=[],$datos2=[]){

            if(file_exists("../app/view/paginas/formularios/".$vista.".php")){
            require_once("../app/view/paginas/formularios/".$vista.".php");
            require RUTA_APP.'/view/inc/footer.php';
            }else{
                die("no existe el archivo");
            }
            // echo $vista;
        }

        public function validar($dato){
            $respuesta=ltrim( strtoupper( str_replace( array("<" , ">" , ";" , "'", '"'), "", strip_tags ($dato))));
            return $respuesta;
        }

    }
?>

