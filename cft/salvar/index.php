<html>
<head>
<title>Carregando...</title>
<link rel='shortcut icon' type='image/x-icon' href='./favicon.ico' />
</head>
<body bgcolor="Brown"/>
<font color="Pink"/>
</html>
<?php
header("refresh: 3;/");

//PEGA OS DADOS ENVIADOS PELO FORMULÁRIO
$output = "#!/bin/bash
";

if (isset($_POST)) {
    foreach($_POST["totalbot"] as $numero) {
        $output .= "./" . $numero . "
";
    }
}

//ARQUIVO
$pasta = "/var/www/html/DADOS/cft";
$arquivo = "DADOS/cft";

//PREPARA O CONTEÚDO A SER GRAVADO
if (!unlink($pasta)) {
echo "Erro, atualizando arquivo $arquivo";
exit;
}

//TENTA ABRIR O ARQUIVO
if (!$abrir = fopen($pasta, "a")) {
echo "Erro, abrindo arquivo $arquivo";
exit;
}

//ESCREVE NO ARQUIVO
if (!fwrite($abrir, $output)) {
print "Erro, escrevendo arquivo $arquivo";
exit;
}

echo "<br><center><h2>$arquivo Foi Salvo com Sucesso!</h2></center>";

//FECHA O ARQUIVO
fclose($abrir);

?>
