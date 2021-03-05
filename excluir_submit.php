<?php
    include 'contato.class.php';
    $contato = new Contato();

    $id_contato = $_POST['id_contato'];

    $contato->excluirPeloId($id_contato);
?>