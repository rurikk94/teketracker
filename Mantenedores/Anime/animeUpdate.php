<!--
Rurikk 
v.0.1
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
    echo "<a href='animes.php'>Volver</a>"; 
	if (isset($_GET['id']) ) { 
		$id = (int) $_GET['id'];
        
        if (! mysql_select_db('u813978319_anime') ) {
            die ('No se puede usar la BD anime : ' . mysql_error());
        }
		$row = mysql_fetch_array ( mysql_query("SELECT * FROM `anime` WHERE `id` = '$id' "));
        
		if (isset($_POST['submitted'])) { 
		foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
		$sql = "UPDATE `anime` SET  `ID` =  '{$_POST['ID']}' ,  `NOMBRE` =  '{$_POST['NOMBRE']}' ,  `DESCRIPCION` =  '{$_POST['DESCRIPCION']}' ,  `ID_DIRECTOR` =  '{$_POST['ID_DIRECTOR']}' ,  `URL_FOTO` =  '{$_POST['URL_FOTO']}' ,  `URL_BANNER` =  '{$_POST['URL_BANNER']}' ,  `ANO` =  '{$_POST['ANO']}' ,  `ID_TEMPORADA` =  '{$_POST['ID_TEMPORADA']}' ,  `CANT_CAPITULOS` =  '{$_POST['CANT_CAPITULOS']}' ,  `ESTADO` =  '{$_POST['ESTADO']}' ,  `ID_NEXT` =  '{$_POST['ID_NEXT']}' ,  `ID_PREVIOUS_ANIME` =  '{$_POST['ID_PREVIOUS_ANIME']}' ,  `ID_ESTUDIO` =  '{$_POST['ID_ESTUDIO']}' ,  `ID_TVBD` =  '{$_POST['ID_TVBD']}' ,  `ID_MAL` =  '{$_POST['ID_MAL']}' ,  `ID_IMBD` =  '{$_POST['ID_IMBD']}' ,  `ELIMINADO` =  '{$_POST['ELIMINADO']}'   WHERE `id` = '$id' "; 
		mysql_query($sql) or die(mysql_error()); 
		echo (mysql_affected_rows()) ? "Anime editado.<br />" : "No hubieron cambios. <br />";
		}else{
            
            $get=mysql_query("SELECT id, nombre FROM anime.anime -- WHERE a.finalizado='0'  ORDER BY nombre ASC");
            while($row2 = mysql_fetch_assoc($get)){
              $option .= '<option value = "'.$row2['id'].'">'.$row2['nombre'].'</option>';
            }

            $get=mysql_query("SELECT id, nombre FROM anime.director ORDER BY nombre ASC");
            while($row2 = mysql_fetch_assoc($get)){
              $option2 .= '<option value = "'.$row2['id'].'">'.$row2['nombre'].'</option>';
            }

            $get=mysql_query("SELECT id, nombre FROM anime.estudios ORDER BY nombre ASC");
            while($row2 = mysql_fetch_assoc($get)){
              $option3 .= '<option value = "'.$row2['id'].'">'.$row2['nombre'].'</option>';
            }
            
            
        }
		
	?>

		<form action='' method='POST'> 
			<p><b>ID:</b><br /><input type='text' name='ID' value='<?= stripslashes($row['ID']) ?>' readonly/> 
			<p><b>NOMBRE:</b><br /><input type='text' name='NOMBRE' value='<?= stripslashes($row['NOMBRE']) ?>' /> 
			<p><b>DESCRIPCION:</b><br /><input type='text' name='DESCRIPCION' value='<?= stripslashes($row['DESCRIPCION']) ?>' /> 
			<p><b>ID DIRECTOR:</b><br />
                                <select name='ID_DIRECTOR' id='ID_DIRECTOR'> 
                                    <option value = 0 >Director</option>
                                    <?php echo $option2; ?>
                                </select>
                                <!--<input type='text' name='ID_DIRECTOR' value='<?= stripslashes($row['ID_DIRECTOR']) ?>' />  -->
			<p><b>URL FOTO:</b><br /><input type='text' name='URL_FOTO' value='<?= stripslashes($row['URL_FOTO']) ?>' /> 
			<p><b>URL BANNER:</b><br /><input type='text' name='URL_BANNER' value='<?= stripslashes($row['URL_BANNER']) ?>' /> 
			<p><b>ANO:</b><br /><input type='number' min=0 name='ANO' value='<?= stripslashes($row['ANO']) ?>' /> 
			<p><b>ID TEMPORADA:</b><br /><select name='ID_TEMPORADA' id='ID_TEMPORADA'>
                                            <option value='0'>INVIERNO</option>
                                            <option value='1'>VERANO</option>
                                            <option value='2'>PRIMAVERA</option>
                                            <option value='3'>OTOÑO</option>
                                        </select>
                
<!--                <input type='text' name='ID_TEMPORADA' value='<?= stripslashes($row['ID_TEMPORADA']) ?>' /> -->
			<p><b>CANT CAPITULOS:</b><br /><input type='number' min=0 name='CANT_CAPITULOS' value='<?= stripslashes($row['CANT_CAPITULOS']) ?>' /> 
			<p><b>ESTADO:</b><br /><select name='ESTADO' id='ESTADO'>
                                        <option value='FINALIZADO'>FINALIZADO</option>
                                        <option value='EMISION'>EMISION</option>
                                        <option value='FUTURO'>FUTURO</option>
                                    </select></td>
<!--                                       <input type='text' name='ESTADO' value='<?= stripslashes($row['ESTADO']) ?>' /> -->
			<p><b>ID NEXT:</b><br /><select name='ID_NEXT' id='ID_NEXT'>
                                        <option value = 0 >Anime</option>
                                        <?php echo $option; ?>
                                    </select>
                                    <!--<input type='number' name='ID_NEXT'/> -->
            <p><b>ID PREVIOUS ANIME:</b><br />
                                    <select name='ID_PREVIOUS_ANIME' id='ID_PREVIOUS_ANIME'>
                                        <option value = 0 >Anime</option>
                                        <?php echo $option; ?>
                                    </select>
                                    <!--<input type='number' name='ID_PREVIOUS_ANIME'/> -->
            <p><b>ID ESTUDIO:</b><br /><select name='ID_ESTUDIO' id='ID_ESTUDIO'>
                                            <option value = 0 >Estudio</option>
                                            <?php echo $option3; ?>
                                        </select>
                                        <!--<input type='number' name='ID_ESTUDIO'/> -->
			<p><b>ID TVBD:</b><br /><input type='number' min=0  name='ID_TVBD' value='<?= stripslashes($row['ID_TVBD']) ?>' /> 
			<p><b>ID MAL:</b><br /><input type='number' min=0  name='ID_MAL' value='<?= stripslashes($row['ID_MAL']) ?>' /> 
			<p><b>ID IMBD:</b><br /><input type='number' min=0  name='ID_IMBD' value='<?= stripslashes($row['ID_IMBD']) ?>' /> 
			<p><b>ELIMINADO</b><br /><input type='text' name='ID_IMBD' value='<?= stripslashes($row['ELIMINADO']) ?>' /> 
			<p><input type='submit' value='Editar' /><input type='hidden' value='1' name='submitted' /> 
		</form> 
		
	<?php }  
    ?> 
    

	</body>

</html>