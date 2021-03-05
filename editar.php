<?php
    sleep(1);
    include 'contato.class.php';
    $contato = new Contato();

    $id_contato = $_POST['id_contato'];

    $info = $contato->getInfo($id_contato);

?>
<h1>Editar [<?= $id_contato;?>]</h1>
<hr/>
<form id="formEditar" method="POST" action="editar_submit.php">
	<input type="hidden" name="frm_edit_id" value="<?php echo $info['cnto_id']; ?>" />

	Nome:<br/>
	<input type="text" name="frm_edit_nome" value="<?php echo $info['cnto_nome']; ?>" /><br/><br/>

	E-mail:<br/>
	<input type="email" name="frm_edit_email" value="<?php echo $info['cnto_email']; ?>" /><br/><br/>

	<input type="submit" value="Salvar" />
</form>

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
                alert("Dados alterados com sucesso!");
                $('#modal').modal('hide');
                window.location.href = window.location.href;
            }
        });
    });


</script>