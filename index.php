<?php
/**
 * Created by PhpStorm.
 * User: cslaviero
 * Date: 17/09/2018
 * Time: 15:55
 */

$GLOBALS['alerta']="";

function add_frequencia($rga){
    $date = date("d_m_Y",time());

    // primeiro pega o arquivo de frequencias
    $jsFreq = file_get_contents("frequencias.json");
    // formato: chave : data forma d_m_aaaa , valor array de frequencias no formato "ALUNO": {"P" || "F"}
    // decode
    $arrFreq = json_decode($jsFreq,true);

    // se não houver aquela data, inicializa

    $file = file_get_contents('roster.json');
    $roster = json_decode($file,true);

    if (!isset($arrFreq[$date])){
        // vamos criar!
        // echo gettype($roster['data']);
        $arrFreq[$date]['data']= Array();
        foreach($roster['data'] as $k => $v){
           // echo "$v <br>";
            array_push($arrFreq[$date]['data'],array("rga"=>$k,"nome"=>$v,"frequencia"=>"F"));
        } //iniciei tudo
    }


    //insert_frequencia($rga);
        //hora de adicionar!
        //esse rga precisa existir (então precisa estar no $roster)
        //se no roster existe aqueele RGA...

        if ($roster['data'][$rga]){

            //percorre a lista de frequencia o aluno com aquele RGA
            // o dado está em $arrFreq[$date]['data'][i], sendo i o índice do array. o foreach percore o array
            // e retorna como valor o array com rga, nome e frequencia
            foreach($arrFreq[$date]['data'] as $k => $v ){
                $rga_json = $v['rga'];
                //se os dois forem iguais
                if ($rga_json == $rga ){
                    $arrFreq[$date]['data'][$k]['frequencia'] = "P";
                }
            }

            // salva as mudanças (commita no 'servidor')
            $json = json_encode($arrFreq);
            file_put_contents("frequencias.json", $json);
            $GLOBALS['alerta'] = "<span>Salvo!</span>";

        }else{//se não existe no roster o RGA...
            //nao posso adicionar, não foi encontrado (como dou essa mensagem de erro?)
            $GLOBALS['alerta'] = "Não encontrado.";
            return;
        }
}
// principal

if (isset($_GET['rga'])){
    add_frequencia($_GET['rga']);
}
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilo.css">
    <title>Pega Frequência</title>
</head>
<body>
    <div id="alerta" ><?php echo $GLOBALS['alerta'];?></div>
    <div>
        <h1>Pega Frequência</h1>
        <form action="<?php $_SERVER['PHP_SELF']?>" method="GET">
            <input type="text" id="rga" name="rga" placeholder="Qual seu RGA?">
            <input type="submit" value="Registrar Presença">
        </form>
    </div>
</body>
</html>