<?php
include '../../class/Contato.class.php';
$Contato = new Contato();

$id_contato = $_POST['id_contato'];

$Contato->ativarContato($id_contato);
?>