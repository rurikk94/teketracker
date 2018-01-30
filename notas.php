<!--RurikkWare -->
<html>
<head>
	<meta http-equiv='Content-type' content='text/html; charset=utf-8' />
	<link rel='stylesheet' type='text/css' href='../style.css'>
</head>
<body>
<center>
<?php 

if (isset($_POST['submitted'])) { 
	
    $promedioCatedras = ($_POST['n1']+$_POST['n2']+$_POST['n3'])/3 ;
    $promedioAyudantias = ($_POST['a1']+$_POST['a2']+$_POST['a3'])/3 ;
    $promedioQuizz = $_POST['q1'] ;
    $promedio = $promedioCatedras*0.75 + $promedioAyudantias*0.1 +  $promedioQuizz*0.15;
    echo "<h1>Catedras = ".$promedioCatedras."</h1>";
    echo "<h1>Ayudantia = ".$promedioAyudantias."</h1>";
    echo "<h1>Quiz = ".$promedioQuizz."</h1>";
    echo "<h1>NOTA PRESENTACION =".$promedio."</h1>";
    if ($promedio>=45){
        echo "<h1>Pasaste wn!! :D</h1>";
    }else {
        echo "<h1>Vas a examen ql</h1>";
    }
    
    
}else{
        echo " 
        <form action='' method='POST'>
            <h1>Catedras (75 %) </h1>
            <p><b>certamen 1:</b><br /><input type='number' name='n1'  maxlength='2'/> 
            <p><b>certamen 2:</b><br /><input type='number' name='n2'  maxlength='2'/> 
            <p><b>certamen 3:</b><br /><input type='number' name='n3'  maxlength='2'/> 

            <h1>Pruebas de Ayudantias (10 %)</h1>
            <p><b>Ayudantias 1:</b><br /><input type='number' name='a1'  maxlength='2'/> 
            <p><b>Ayudantias 2:</b><br /><input type='number' name='a2'  maxlength='2'/> 
            <p><b>Ayudantias 3:</b><br /><input type='number' name='a3'  maxlength='2'/> 

            <h1>Control (Quizz) (15 %) </h1>
            <p><b>Quizz 1:</b><br /><input type='number' name='q1'  maxlength='2'/>


            <p><input type='submit' value='Calcular Notas' /><input type='hidden' value='1' name='submitted' /> 
        </form>";
        
}
    ?>


    <div id="pie"><h6><a href="http://pastebin.com/Lw1gkAZg">Source Code</a></h6></div>
    </center>
</body> 
</html>