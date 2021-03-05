<?php
    sleep(1);
    include 'contato.class.php';
    $contato = new Contato();

    $id_contato = $_POST['id_contato'];

    $info = $contato->getInfo($id_contato);

?>
<hr/>
<strong>Voce deseja realmente exluir o contato,</strong> [<?= $id_contato;?>] <strong>?</strong>
<br/>
<br/>
<button type="button" onclick="excluirContato('<?= $id_contato;?>');">Sim</button>
<button type="button" onclick="fechar();">Não</button>

<script type="text/javascript">
    function excluirContato(id_contato) {
        $.ajax({
            url: 'excluir_submit.php',
            type: 'POST',
            data: {id_contato: id_contato},
            success: function (data) {
                //console.info(data);
                alert("Contato excluido com sucesso!");
                $('#modal').modal('hide');
                window.location.href = window.location.href;
            }
        });
    }
</script>
