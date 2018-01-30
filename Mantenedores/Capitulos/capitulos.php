<!--//v.0.1.2016.12.22
    //Rurikk rurikk@tekeremata.org

    //se divide en 4 funciones
    //#1 = listado de animes
    //#2 = update de capitulo en bd
    //#3 = listado de capitulos del anime, para editar o eliminar
    //#4 = formulario de edicion-->

<html> 
<head>
	<meta http-equiv='Content-type' content='text/html; charset=utf-8' />
	<link rel='stylesheet' type='text/css' href='../style.css'>
</head>
<body>
    
<?php 
    
    include('../config.php');
    
    //#1 si no se envian variables, se muestra listado de animes.
    if (!isset($_GET['id']) && !isset($_GET['id_episodio']) ) {
        
            if (! mysql_select_db('u813978319_anime') ) {
                die ('No se puede usar la BD anime : ' . mysql_error());
            }
            //$result = mysql_query("SELECT * FROM `anime` where ELIMINADO=0 order by nombre") or trigger_error(mysql_error()); 
            $result = mysql_query("SELECT   @id:=ID ID, 
                                            nombre NOMBRE, 
                                            CANT_CAPITULOS CANT_CAPITULOS,
                                            ANO,
                                            (select count(*) from episodios WHERE ID_ANIME = @id) CAPITULOSCREADOS 
                                        FROM `anime` where ELIMINADO=0 order by nombre") or trigger_error(mysql_error()); 

        echo"<table>
                 <caption>
                    <table>
                        <td><a href=episodioAdd.php>Agregar Nuevo Episodio</a></td>
                        <td><a href=../../animeTekeAdmin.php>Volver</a></td>
                    </table>
                 </caption>
                <tr>
                    <th>Anime</th>
                    <th>Año</th>
                    <th>Capitulos</th>
                    <th>Capitulos Creados</th>
                    <th>Capitulos Faltantes</th>
                </tr>";


        while($row = mysql_fetch_array($result)){ 

            foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 

            echo "<tr>";
            if ($row['CAPITULOSCREADOS']==0){
                    echo "<td valign='top'>" . nl2br( $row['NOMBRE']) . "</a></td>";
            }else{
                    echo "<td valign='top'><a href='capitulos.php?id={$row['ID']}&nombre=" . nl2br( $row['NOMBRE']) . "'>" . nl2br( $row['NOMBRE']) . "</a></td>"; 
            }
                    echo "<td valign='top'>" . nl2br( $row['ANO']) . "</td>";  
                    echo "<td valign='top'>" . nl2br( $row['CANT_CAPITULOS']) . "</td>";
                    echo "<td valign='top'>" . nl2br( $row['CAPITULOSCREADOS']) . "</td>";
                    echo "<td valign='top'>" . nl2br( $row['CANT_CAPITULOS']-$row['CAPITULOSCREADOS']) . "</td>";
            echo "</tr>"; 
        }
        echo "</table>";
        
    }
    
    
    //#2 si se envia un submitted de editar capitulo, se hace el update.
    if (isset($_POST['submitted'])) { 
        foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
        if (! mysql_select_db('u813978319_anime') ) {
                        die ('No se puede usar la BD anime : ' . mysql_error());
                    }
        if ($_POST['FECHA']==""){$fecha= NULL;}else{$fecha="  `FECHA` =  '".$_POST['FECHA']  ."', ";}
        $sql = "UPDATE `episodios` SET   `NUM_EPISODIO` =  '{$_POST['NUM_EPISODIO']}' ,  `NUM_TEMPORADA` =  '{$_POST['NUM_TEMPORADA']}' ,  `TITULO` =  '{$_POST['TITULO']}' ,  `DESCRIPCION` =  '{$_POST['DESCRIPCION']}' , ".$fecha." `ID_ANIME` =  '{$_POST['ID_ANIME']}'   WHERE `id` = '{$_POST['ID']}' "; 
        echo $sql."<br />";
        mysql_query($sql) or die(mysql_error()); 
        echo (mysql_affected_rows()) ? "Episodio Modificado .<br />" : "Nada se modifico. <br />"; 
        echo "<a href='capitulos.php?id={$_POST['ID_ANIME']}'>Volver</a>"; 
    } else {
    //sino 
        //#3 si se envia variable id = id_anime
        // se muestra listado de capitulos del anime.
                 if (isset($_GET['id'])) {
              //  echo "<table><tr><td><h3> ID del Anime<br/> ".$_GET['id']."</h3></td><td><h1>".$_GET['nombre']." </h1></td></tr></table>";

                    if (! mysql_select_db('u813978319_anime') ) {
                        die ('No se puede usar la BD anime : ' . mysql_error());
                    }

                    $query = "SELECT id,num_episodio, num_temporada, titulo, fecha, (select nombre from anime.anime where id=".$_GET['id']. " ) nombre FROM `episodios` where id_anime=".$_GET['id']. " order by num_episodio";
                    //echo $query."<br />";
                    $result = mysql_query($query) or trigger_error(mysql_error());
                     

                     
                    echo "<table>
                            <td><a href=episodioAdd.php>Agregar Nuevo Episodio</a></td>
                            <td><a href=capitulos.php>Volver</a></td>
                        </table>";
                     
                     $a=0;
                     

                    while($row = mysql_fetch_array($result)){ 

                        foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
                        if ($a==0){
                        echo "
                              <table>
                              <caption><h2>{$_GET['id']} - {$row['nombre']}</h2></caption>";
                              $a=1;
                        }
                        echo "<tr>";    
                                echo "<td valign='top'><a href=capitulos.php?id_episodio={$row['id']}>" . nl2br( $row['num_temporada']) . "x". nl2br( $row['num_episodio']) . "</a></td>"; 
                                echo "<td valign='top'>" . nl2br( $row['titulo']) . "</td>";  
                                echo "<td valign='top'>" . nl2br( $row['fecha']) . "</td>";  
                                echo "<td valign='top'>id: " . nl2br( $row['id']) . "</td>";
                        echo "</tr>"; 
                    }
                    echo "</table>";
            }
            //#4 si envia id_episodio se form para editar y boton update
           if (isset($_GET['id_episodio'])) {

                    if (! mysql_select_db('u813978319_anime') ) {
                        die ('No se puede usar la BD anime : ' . mysql_error());
                    }

                    $query = "SELECT * FROM `episodios` where id=".$_GET['id_episodio'];
                    $row = mysql_fetch_array ( mysql_query("SELECT * FROM `episodios` WHERE `id` = '".$_GET['id_episodio']."' "));
                echo "<a href='capitulos.php?id=". stripslashes($row['ID_ANIME']) ."'>Volver sin Modificar</a>"; 
                echo "<table><caption>
                        <h2> id : ". stripslashes($row['ID']) ." - ". stripslashes($row['TITULO']) ." </h2>";
                echo "</caption>
                    <form action='' method='POST'> 
                        <tr><td>ID:</td><td><input type='text' readonly name='ID' value='". stripslashes($row['ID']) ."' />  </td></tr>
                        <tr><td>NUM EPISODIO:</td><td><input type='text' name='NUM_EPISODIO' value='". stripslashes($row['NUM_EPISODIO']) ."' />  </td></tr>
                        <tr><td>NUM TEMPORADA:</td><td><input type='text' name='NUM_TEMPORADA' value='". stripslashes($row['NUM_TEMPORADA']) ."' />  </td></tr>
                        <tr><td>TITULO:</td><td><input type='text' name='TITULO' value='". stripslashes($row['TITULO']) ."' />  </td></tr>
                        <tr><td>DESCRIPCION:</td><td><input type='text' name='DESCRIPCION' value='". stripslashes($row['DESCRIPCION']) ."' />  </td></tr>
                        <tr><td>FECHA:</td><td><input type='text' name='FECHA' value='{$row['FECHA']}' />   </td></tr>
                        <tr><td>ID ANIME:</td><td><input type='text' name='ID_ANIME' value='". stripslashes($row['ID_ANIME']) ."' />  </td></tr>
                        <tr><td><input type='submit' value='Edit Row' /><input type='hidden' value='1' name='submitted' /> </tr>
                    </form>
                    </table>";
            }
        
    }
    
   
    
     
        
?>
</body> 
</html>