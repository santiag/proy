<br><br><br><br><br><br>

<a href="<?php echo RUTA_URL;?>/paginas">Volver</a>
<?php
if(isset($documento)){
	$usuario= new paginas();
	$usuario->agregar();
}
?>
<form method="POST">
	<label for="tipo_documento">Tipo de documento: <sup>*</sup></label>
	<select name="tipo_documento">
		<option value="1">C&eacute;dula de ciudadan&iacute;a</option>
		<option value="2">C&eacute;dula de extranjer&iacute;a</option>
		<option value="3">Tarjeta de identidad</option>
		<option value="4">Pasaporte</option>
	</select>
	<label for="documento">N&uacute;mero de documento: <sup>*</sup></label>
	<input type="text" name="documento">
	<label for="primer_nombre">Primer nombre: <sup>*</sup></label>
	<input type="text" name="primer_nombre">
	<label for="segundo_nombre">Segundo nombre: <sup>*</sup></label>
	<input type="text" name="segundo_nombre">
	<label for="primer_apellido">Primer apellido: <sup>*</sup></label>
	<input type="text" name="primer_apellido">
	<label for="segundo_apellido">Segundo apellido: <sup>*</sup></label>
	<input type="text" name="segundo_apellido">
	<label for="correo">Correo: <sup>*</sup></label>
	<input type="text" name="correo">
	<label for="contrasena">Contrase&ntilde;a: <sup>*</sup></label>
	<input type="password" name="contrasena">
	<button type="submit">Registrarse</button>
</form>
