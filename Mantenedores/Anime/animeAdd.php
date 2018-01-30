<!--
Rurikk 
Cualquier error o sugerencia envie un email a
rurikk@tekeremata.org
-->
<html> 
<head>
	<meta http-equiv='Content-type' content='text/html; charset=utf-8' />
	<link rel='stylesheet' type='text/css' href='../style.css'>
</head>
<body>

<?php 

include('../config.php'); 
if (isset($_POST['submitted'])) { 
	foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
    
    if (! mysql_select_db('u813978319_anime') ) {
        die ('No se puede usar la BD anime : ' . mysql_error());
    }
    
	$sql = "INSERT INTO `anime` ( `NOMBRE` ,  `DESCRIPCION` ,  `ID_DIRECTOR` ,  `URL_FOTO` ,  `URL_BANNER` ,  `ANO` ,  `ID_TEMPORADA` ,  `CANT_CAPITULOS` ,  `ESTADO` ,  `ID_NEXT` ,  `ID_PREVIOUS_ANIME` ,  `ID_ESTUDIO` ,  `ID_TVBD` ,  `ID_MAL` ,  `ID_IMBD`  ) VALUES(  '{$_POST['NOMBRE']}' ,  '{$_POST['DESCRIPCION']}' ,  '{$_POST['ID_DIRECTOR']}' ,  '{$_POST['URL_FOTO']}' ,  '{$_POST['URL_BANNER']}' ,  '{$_POST['ANO']}' ,  '{$_POST['ID_TEMPORADA']}' ,  '{$_POST['CANT_CAPITULOS']}' ,  '{$_POST['ESTADO']}' ,  '{$_POST['ID_NEXT']}' ,  '{$_POST['ID_PREVIOUS_ANIME']}' ,  '{$_POST['ID_ESTUDIO']}' ,  '{$_POST['ID_TVBD']}' ,  '{$_POST['ID_MAL']}' ,  '{$_POST['ID_IMBD']}'  ) "; 
	mysql_query($sql) or die(mysql_error()); 
	echo "Anime agregado.<br />";
	$cant=$_POST['CANT_CAPITULOS'];
}else{
    
    $get=mysql_query("SELECT id, nombre FROM anime.anime -- WHERE a.finalizado='0'  ORDER BY nombre ASC");
    while($row = mysql_fetch_assoc($get)){
      $option .= '<option value = "'.$row['id'].'">'.$row['nombre'].'</option>';
    }
    
    $get=mysql_query("SELECT id, nombre FROM anime.estudios ORDER BY nombre ASC");
    while($row = mysql_fetch_assoc($get)){
      $option3 .= '<option value = "'.$row['id'].'">'.$row['nombre'].'</option>';
    }
    
    $get=mysql_query("SELECT id, nombre FROM anime.director ORDER BY nombre ASC");
    while($row = mysql_fetch_assoc($get)){
      $option2 .= '<option value = "'.$row['id'].'">'.$row['nombre'].'</option>';
    }
    
    $get=mysql_query("SELECT id, name FROM tracker.torrents ORDER BY name ASC");
    while($row = mysql_fetch_assoc($get)){
      $option4 .= '<option value = "'.$row['id'].'">'.$row['name'].'</option>';
    }
}

echo "<a href='animes.php'>Volver</a>"; 
?>

<form action='' method='POST'>
	<p><b>NOMBRE:</b><br /><input type='text' name='NOMBRE'  maxlength='50' placeholder='Nombre'/> 
	<p><b>DESCRIPCION:</b><br /><input type='text' name='DESCRIPCION'  maxlength='1000'  placeholder='Descripcion'/> 
	<p><b>ID DIRECTOR:</b><br />
                                <select> 
                                    <option value = 0 >Director</option>
                                    <?php echo $option2; ?>
                                </select>
                                <!--<input type='text' name='ID_DIRECTOR'/> -->
	<p><b>URL FOTO:</b><br /><input type='text' name='URL_FOTO'  maxlength='150'/> 
	<p><b>URL BANNER:</b><br /><input type='text' name='URL_BANNER'/> 
	<p><b>AÑO:</b><br /><input type='number' min=0  name='ANO'  maxlength='4' value='2017'/> 
	<p><b>ID TEMPORADA:</b><br /><select name='ID_TEMPORADA'>
						<option value='0'>INVIERNO</option>
						<option value='1'>VERANO</option>
						<option value='2'>PRIMAVERA</option>
						<option value='3'>OTOÑO</option>
					</select>
	<p><b>CANT CAPITULOS:</b><br /><input type='number' min=0 name='CANT_CAPITULOS' size='22' maxlength='3' value='0'/> 
	<p><b>ESTADO:</b><br /><select name='ESTADO'>
								<option value='FINALIZADO'>FINALIZADO</option>
								<option value='EMISION'>EMISION</option>
								<option value='FUTURO'>FUTURO</option>
							</select></td>
	<p><b>ID NEXT:</b><br /><select name='ID_NEXT'>
                                <option value = 0 >Anime</option>
                                <?php echo $option; ?>
                            </select>
        <!--<input type='number' name='ID_NEXT'/> -->
	<p><b>ID PREVIOUS ANIME:</b><br />
                            <select name='ID_PREVIOUS_ANIME'>
                                <option value = 0 >Anime</option>
                                <?php echo $option; ?>
                            </select><!--<input type='number' name='ID_PREVIOUS_ANIME'/> -->
	<p><b>ID ESTUDIO:</b><br /><select name='ID_ESTUDIO'> 
                                    <option value = 0 >Estudio</option>
                                    <?php echo $option3; ?>
                                </select>
                                <!--<input type='text' name='ID_ESTUDIO'/> -->
    <!--<p><b>ID ESTUDIO:</b><br /><select nam="torrent"> 
                                    <option value = 0 >Torrent</option>
                                    <?php //echo $option4; ?>
                                </select>
                                <input type='text' name='ID_ESTUDIO'/> -->
	<p><b>ID TVBD:</b><br /><input type='number' min='0' maxlength='3' name='ID_TVBD'/> 
	<p><b>ID MAL:</b><br /><input type='number' min='0' maxlength='3' name='ID_MAL'/> 
	<p><b>ID IMBD:</b><br /><input type='number' min='0' maxlength='3' name='ID_IMBD'/> 
	<p><input type='submit' value='Agregar Anime' /><input type='hidden' value='1' name='submitted' /> 
</form>

</body> 
</html>