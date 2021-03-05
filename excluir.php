<?php
    sleep(1);
    include 'contato.class.php';
    $contato = new Contato();

    $id_contato = $_POST['id_contato'];

    $info = $contato->getInfo($id_contato);

?>
<script type="text/javascript" src="assets/js/script.js"></script>

<hr/>
<strong>Voce deseja realmente exluir o contato,</strong> [<?= $id_contato;?>] <strong>?</strong>
<br/>
<br/>
<button type="button" class="btn btn-info btn-sm" onclick="excluirContato('<?= $id_contato;?>');">Sim</button>
<button type="button" class="btn btn-info btn-sm" onclick="fechar();">Não</button>
<br/>
<br/>
<div id="boxResultado" style="display: none;"></div>
<script type="text/javascript">
    function excluirContato(id_contato) {
        $.ajax({
            url: 'excluir_submit.php',
            type: 'POST',
            data: {id_contato: id_contato},
            success: function (data) {
                //console.info(data);
                setBoxSucessoAutoHide("boxResultado","Contato excluido com sucesso.", true);
                setTimeout(function () {
                    $('#modal').modal('hide');
                    window.location.href = window.location.href;
                }, 2000);
            }
        });
    }
</script>
