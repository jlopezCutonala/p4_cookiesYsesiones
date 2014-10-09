<!DOCTYPE HTML>
<html>
  <head>
    <title>Guardar y restaurar preferencias del usuario</title>
  </head>
  <body>
    <h2>Guardar y restaurar preferencias del usuario</h2>
    <h3>Seleccione sus Preferencias de Vuelo</h3>
	<?php
	// si la forma ya ha sido enviada
	// escribe la cookie con la configuración
	if(isset($_POST['submit'])) {
	  $ret1 = (isset($_POST['nombre'])) ? 
        setcookie('nombre', $_POST['nombre'], mktime() + 3600, '/') : null;

	  $ret2 = (isset($_POST['asiento'])) ? 
        setcookie('asiento', $_POST['asiento'], mktime() + 3600, '/') : null;

	  $ret3 = (isset($_POST['comida'])) ? 
            setcookie('comida', $_POST['comida'], mktime() + 3600, '/') : null;

	  $ret4 = (isset($_POST['ofertas'])) ? 
        setcookie('ofertas', implode(',',$_POST['ofertas']), mktime() + 3600, '/') : null;
	}
	// lee la cookie y asigna sus valores 
	//  a variables PHP
	$nombre = isset($_COOKIE['nombre']) ? $_COOKIE['nombre'] : '';
	$asiento = isset($_COOKIE['asiento']) ? $_COOKIE['asiento'] : '';
	$comida = isset($_COOKIE['comida']) ? $_COOKIE['comida'] : '';
	$ofertas = isset($_COOKIE['ofertas']) ? explode(",",$_COOKIE['ofertas']) : array();
	?>
	<?php
	// si el formulario ya ha sido enviado
	// despliega mensaje de éxito
	if (isset($_POST['submit'])) {
	?>
		Gracias por su selecci&oacute;n.
	<?php
	} else {
	?>
		<form method="post" action="cookies.php">
		Nombre: <br />
		<input type="text" size="20" name="nombre" value="<?php echo $nombre; ?>" />
		<p>
		Selecci&oacute;n de asiento: <br />
		<input type="radio" name="asiento" value="pasillo" <?php echo($asiento == 'pasillo') ? 'checked' : ''; ?>/>Pasillo
		<input type="radio" name="asiento" value="ventana" <?php echo($asiento == 'ventana') ? 'checked' : ''; ?>/>Ventana
		<input type="radio" name="asiento" value="centro" <?php echo($asiento == 'centro') ? 'checked' : ''; ?>/>Centro
		<p>
		Selecci&oacute;n de comida: <br />
		<input type="radio" name="comida" value="normal-veg" <?php echo($comida == 'normal-veg') ? 'checked' : ''; ?>/>Vegetariana
		<input type="radio" name="comida" value="normal-nveg" <?php echo($comida == 'normal-nveg') ? 'checked' : ''; ?>/>No Vegetariana
		<input type="radio" name="comida" value="diabetica" <?php echo ($comida == 'diabetica') ? 'checked' : ''; ?>/>Diab&eacute;tica
		<input type="radio" name="comida" value="nino" <?php echo ($comida == 'nino') ? 'checked' : ''; ?>/>Ni&ntilde;o
		<p>
		Estoy interesado en ofertas especiales de los vuelos a: <br />
		<input type="checkbox" name="ofertas[]" value="LHR" <?php echo in_array('LHR', $ofertas) ? 'checked' : ''; ?>/>Londres
		<input type="checkbox" name="ofertas[]" value="CDG" <?php echo in_array('CDG', $ofertas) ? 'checked="checked"' : ''; ?>/>Par&iacute;s
		<input type="checkbox" name="ofertas[]" value="CIA" <?php echo in_array('CIA', $ofertas) ? 'checked' : ''; ?>/>Roma
		<input type="checkbox" name="ofertas[]" value="IBZ" <?php echo in_array('IBZ', $ofertas) ? 'checked' : ''; ?>/>Ibiza
		<input type="checkbox" name="ofertas[]" value="SIN" <?php echo in_array('SIN', $ofertas) ? 'checked' : ''; ?>/>Singapur
		<input type="checkbox" name="ofertas[]" value="HKG" <?php echo in_array('HKG', $ofertas) ? 'checked' : ''; ?>/>Hong Kong
		<input type="checkbox" name="ofertas[]" value="MLA" <?php echo in_array('MLA', $ofertas) ? 'checked' : ''; ?>/>Malta
		<input type="checkbox" name="ofertas[]" value="BOM" <?php echo in_array('BOM', $ofertas) ? 'checked' : ''; ?>/>Bombay
		<p>
		<input type="submit" name="submit" value="Enviar" />
		</form>
	<?php
	}
	?>
  </body>
</html>
