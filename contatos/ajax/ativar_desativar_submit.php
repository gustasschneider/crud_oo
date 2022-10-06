<?php
include '../../class/Contato.class.php';
$Contato = new Contato();

$id_contato = $_POST['id_contato'];
$status_contato = $_POST['status_contato'];

echo $Contato->ativarDesativarContato($id_contato, $status_contato);
?>