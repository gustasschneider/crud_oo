<?php
include 'contato.class.php';
$Contato = new Contato();

$postData = new stdClass;

foreach ($_POST as $key => $value){
    $postData->$key = $value;
}

echo $Contato->adicionar($postData);
?>