<?php
    sleep(1);
    include 'contato.class.php';
    $contato = new Contato();

    $id_contato = $_POST['id_contato'];

    $info = $contato->getInfo($id_contato);

?>
<strong>Editar</strong>
<hr/>
<form id="formEditar" method="POST" action="editar_submit.php">

    <div class="form-group">
        <label for="frm_edit_nome">Nome:</label>
        <input class="form-control" type="text" id="frm_edit_nome" name="frm_edit_nome" value="<?php echo $info['cnto_nome']; ?>" />
    </div>

    <div class="form-group">
        <label for="frm_edit_email">E-mail:</label>
        <input class="form-control" type="email" id="frm_edit_email" name="frm_edit_email" value="<?php echo $info['cnto_email']; ?>" />
    </div>

	<input type="hidden" name="frm_edit_id" value="<?php echo $info['cnto_id']; ?>" />

	<input type="submit" class="btn btn-primary btn-block" value="Salvar" />
</form>
<div id="boxResultado" style="display: none;"></div>
<script type="text/javascript">

    $('#modal').find('.modal-body').find('form').on('submit', function (e) {
       e.preventDefault();

        var dados = $("#formEditar").serialize();

        $.ajax({
           url: 'editar_submit.php',
           type: 'POST',
           data: dados,
            success: function (data) {
                //console.info(data);
                setBoxSucessoAutoHide("boxResultado","Dados alterados com sucesso.", true);
                setTimeout(function () {
                    $('#modal').modal('hide');
                    window.location.href = window.location.href;
                }, 2000);
            }
        });
    });


</script>