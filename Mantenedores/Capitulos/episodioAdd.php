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
    $sql = "INSERT INTO `anime`.`episodios` (`NUM_EPISODIO`, `NUM_TEMPORADA`, `TITULO`, `FECHA`, `ID_ANIME`) VALUES(  '{$_POST['CAPITULO']}' ,  '{$_POST['TEMPORADA']}' ,  '{$_POST['TITULO']}' ,  '{$_POST['FECHA']}' ,  '{$_POST['ID_ANIME']}' ) "; 
	mysql_query($sql) or die(mysql_error()); 
	echo "Capitulo agregado.<br />";
	$cant=$_POST['CANT_CAPITULOS'];
}else{
    
    $get=mysql_query("SELECT id, nombre FROM anime.anime -- WHERE a.finalizado='0'  ORDER BY nombre ASC");
    while($row = mysql_fetch_assoc($get)){
      $option .= '<option value = "'.$row['id'].'">'.$row['nombre'].'</option>';
    }
}

echo "<a href='capitulos.php'>Volver</a>"; 
?>

<form action='' method='POST'>
	<p><b>CAPITULO:</b><br /><input type='number' min=0 name='CAPITULO' size='22' maxlength='3' value='0'/>
	<p><b>TEMPORADA:</b><br /><input type='number' min=0 name='TEMPORADA' size='22' maxlength='3' value='0'/>
	<p><b>TITULO:</b><br /><input type='text' name='TITULO'  maxlength='150'/> 
	<p><b>DESCRIPCION:</b><br /><input type='text' name='DESCRIPCION'/> 
	<p><b>FECHA:</b><br /><input type='text' name='FECHA' placeholder='AAAA-MM-DD'/>
	<p><b>ID_ANIME:</b><br /><select name='ID_ANIME'>
                                <option value = 0 >Anime</option>
                                <?php echo $option; ?>
                            </select>
	<p><input type='submit' value='Agregar Anime' /><input type='hidden' value='1' name='submitted' /> 
</form>

</body> 
</html>