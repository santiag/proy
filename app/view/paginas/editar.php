<a href="<?php echo RUTA_URL;?>/paginas">Volver</a>
<form action="<?php echo RUTA_URL;?>/paginas/editar/<?php echo $datos['documento']?>" method="POST">
	<label for="tipo_documento">Tipo de documento: <sup>*</sup></label>
	<select name="tipo_documento">
		<option><?php echo $datos['tipo_documento'];?></option>
		<option value="1">C&eacute;dula de ciudadan&iacute;a</option>
		<option value="2">C&eacute;dula de extranjer&iacute;a</option>
		<option value="3">Tarjeta de identidad</option>
		<option value="4">Pasaporte</option>
	</select>
	<label for="documento">N&uacute;mero de documento: <sup>*</sup></label>
	<input type="text" name="documento" value="<?php echo $datos['documento'];?>">
	<label for="primer_nombre">Primer nombre: <sup>*</sup></label>
	<input type="text" name="primer_nombre" value="<?php echo $datos['primer_nombre'];?>">
	<label for="segundo_nombre">Segundo nombre: <sup>*</sup></label>
	<input type="text" name="segundo_nombre" value="<?php echo $datos['segundo_nombre'];?>">
	<label for="primer_apellido">Primer apellido: <sup>*</sup></label>
	<input type="text" name="primer_apellido" value="<?php echo $datos['primer_apellido'];?>">
	<label for="segundo_apellido">Segundo apellido: <sup>*</sup></label>
	<input type="text" name="segundo_apellido" value="<?php echo $datos['segundo_apellido'];?>">
	<label for="correo">Correo: <sup>*</sup></label>
	<input type="text" name="correo" value="<?php echo $datos['correo'];?>">
	<button type="submit">Actualizar datos</button>

</form>
