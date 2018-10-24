<?php
class PersonaModel{
    
    private $db;

    public function __construct(){
        $this->db = new Base();
    }

    public function ingresarModel($datos)
    {

        try{
            $this->db->query("SELECT `documento`, `contrasena`, `fk_tipo_documento`, primer_nombre,primer_apellido, fk_estado  FROM `persona` WHERE documento=?");
            $this->db->bind(1,$datos["documento"]);          
            $this->db->execute();
            $resultado=$this->db->registro();
            return $resultado;
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }
    public function rol($doc)
       {
           try{
               $this->db->query("SELECT fk_tipo_rol FROM rol WHERE fk_documento=?");
               $this->db->bind(1,$doc);          
               $this->db->execute();
                $resultado=$this->db->registro();
                return $resultado;
           }catch(PDOException $e){
               die($e->getMessage());
        }
    }

    public function registrarModel($datos)
    {
        try{
            $sql2="INSERT INTO `persona`(`documento`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `correo`, `contrasena`, `fk_tipo_documento`) VALUES (?,?,?,?,?,?,?,?)";
            $this->db->query($sql2);
            $this->db->bind(1,$datos["documento"]);
            $this->db->bind(2,$datos["primer_nombre"]);
            $this->db->bind(3,$datos["segundo_nombre"]);
            $this->db->bind(4,$datos["primer_apellido"]);
            $this->db->bind(5,$datos["segundo_apellido"]);
            $this->db->bind(6,$datos["correo"]);
            $this->db->bind(7,$datos["contrasena"]);
            $this->db->bind(8,$datos["fk_tipo_documento"]);
                if($this->db->execute()){
                    $sql3="INSERT INTO `rol`(`fk_tipo_rol`, `fk_documento`) VALUES ('4',?)";
                    $this->db->query($sql3);
                    $this->db->bind(1,$datos["documento"]);
                    if($this->db->execute()){
                        return '<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>Exito!</strong> El usuario se ha registrado correctamente. Ingresa desde el inicio.
                                </div>';
                    }else{
                       return ' <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>Atención!</strong> El usuario no se ha registrado correctamente.
                                </div>';
                    }
                }else{
                    return ' <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>Atención!</strong> El usuario no se ha registrado correctamente.
                                </div>';
                }
        }catch(PDOException $e){
            die($e->getMessage());
        } 
    }

    public function cambiarContraModel($datos)
    {
        try{
            $this->db->query("UPDATE `persona` SET `contrasena`=? WHERE documento=?");
            $this->db->bind(1,$datos["contrasena"]);
            $this->db->bind(2,$datos["documento"]);
            if ($this->db->execute()) {
                return '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Exito!</strong> La contraseña se ha actualizado.
                  </div>';
            }else{
                return '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Atención!</strong> La contraseña no se ha actualizado.
                  </div>';
            }
            
        }catch(PDOException $e){
            die($e->getMessage());
        } 
    }

}
?>