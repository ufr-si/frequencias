<?php
/**
 * Created by PhpStorm.
 * User: cslaviero
 * Date: 17/09/2018
 * Time: 18:37
 */

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1> Lista de frequencias por dia</h1>
    <?php
        $file = file_get_contents('frequencias.json');
        $arr = json_decode($file,true);
        foreach ($arr as $k => $v){
            echo "<h2>".$k."</h2>"; //data
            echo "<table>";
            echo "\n<theader><th>RGA</th><th>Aluno</th><th>Frequencia</th></theader><tbody>";
            foreach($v['data'] as $arrFreq){
                echo "\n<tr><td>".$arrFreq['rga']."</td><td>".$arrFreq['nome']."</td><td>".$arrFreq['frequencia']."</td></tr>";
            }
            echo "</tbody></table>\n\n<br><br>";
        }
    ?>




</body>
</html>

