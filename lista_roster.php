<?php
/**
 * Created by PhpStorm.
 * User: cslaviero
 * Date: 19/09/2018
 * Time: 14:59
 */

$jsFile = file_get_contents('roster.json');

$js_array = json_decode($jsFile,true);


echo "<h1>Lista de Alunos matriculados</h1>";
echo "<h2> {$js_array['nome']}</h2>";
echo "<table>";
foreach ($js_array['data'] as $k=>$v){
    echo "<td>".$k."</td><td>".$v."</td></tr>";
}

echo "</table>";

?>