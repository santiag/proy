<?php
class RolModel {

    private $db;

    function __construct(){
        $this->db=new Base;
    }
    
    public function all()
    {
        try{
             $this->db->query("SELECT * FROM `tipo_rol`");
             $this->db->execute();
            $resultado=$this->db->registros();
            return $resultado;
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }
    public function alld()
    {
        try{
            $this->db->query("SELECT * FROM `rol` WHERE fk_tipo_rol = 4");
            $this->db->execute();
            $resultado=$this->db->registros();
            return $resultado;
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function asignarrolModel($datos)
    {
        try{
            $stm1=$this->conectar()->prepare("DELETE FROM `rol` WHERE fk_documento=?");          
            $stm1->bindParam(1,$datos["documento"],PDO::PARAM_STR);
            $stm1->execute();


            $stm=$this->conectar()->prepare("INSERT INTO `rol`( `fk_tipo_rol`, `fk_documento`) VALUES (?,?)");
            $stm->bindParam(1,$datos["rol"],PDO::PARAM_STR);            
            $stm->bindParam(2,$datos["documento"],PDO::PARAM_STR);         
            if($stm->execute()){
                return '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Exito!</strong> El usuario se ha registrado correctamente. Ingresa desde el inicio.
                  </div>';
            }else{
                return '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Atención!</strong> El usuario no se ha registrado correctamente.
                  </div>';
            }
            //var_dump($datos);
            
        }catch(PDOException $e){
            die($e->getMessage());
        } 
    }

}

?>