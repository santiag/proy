<?php 
class Usuario{
	private $db;

	public function __construct(){
		$this->db = new Base();
	}

	public function obtenerUsuario(){
		$this->db->query('SELECT * FROM usuario');

		$resultados =$this->db->registros();
		return $resultados;
	}
	public function agregarUsuario($datos){
		$this->db->query('INSERT INTO usuario (tipo_documento, documento, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, correo, contrasena) VALUES (:tipo_documento,:documento,:primer_nombre,:segundo_nombre,:primer_apellido,:segundo_apellido,:correo,:contrasena)');

		//vincular valores
		$this->db->bind(':tipo_documento', $datos['tipo_documento']);
		$this->db->bind(':documento', $datos['documento']);
		$this->db->bind(':primer_nombre', $datos['primer_nombre']);
		$this->db->bind(':segundo_nombre', $datos['segundo_nombre']);
		$this->db->bind(':primer_apellido', $datos['primer_apellido']);
		$this->db->bind(':segundo_apellido', $datos['segundo_apellido']);
		$this->db->bind(':correo', $datos['correo']);
		$this->db->bind(':contrasena', $datos['contrasena']);

		//ejecutar
		if($this->db->execute()){
			return true;
		}
		else{
			return false;
		}
	}
	public function obtenerUsuarioId($id){
		$this->db->query("SELECT * FROM usuario WHERE documento=:id_usuario");
		$this->db->bind(':id_usuario',$id);

		$fila = $this->db->registro();

		return $fila;
	}

	public function actualizarUsuario($datos){
		$this->db->query("UPDATE usuario SET tipo_documento=:tipo_documento, documento=:documento, primer_nombre=:primer_nombre, segundo_nombre=:segundo_nombre, primer_apellido=:primer_apellido, segundo_apellido=:segundo_apellido, correo=:correo WHERE documento=:id_usuario");

		//vincular valores
		$this->db->bind(':id_usuario', $datos['documento']);
		$this->db->bind(':tipo_documento', $datos['tipo_documento']);
		$this->db->bind(':documento', $datos['documento']);
		$this->db->bind(':primer_nombre', $datos['primer_nombre']);
		$this->db->bind(':segundo_nombre', $datos['segundo_nombre']);
		$this->db->bind(':primer_apellido', $datos['primer_apellido']);
		$this->db->bind(':segundo_apellido', $datos['segundo_apellido']);
		$this->db->bind(':correo', $datos['correo']);

		//ejecutar
		if($this->db->execute()){
			return true;
		}
		else{
			return false;
		}
	}
	public function borrarUsuario($datos){
		$this->db->query("DELETE FROM usuario WHERE documento=?");

		//vincular valores
		$this->db->bind(1, $datos['id_usuario']);

		//ejecutar
		if($this->db->execute()){
			return true;
		}
		else{
			return false;
		}

	}
}
?>