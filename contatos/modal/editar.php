<?php
sleep(2);
include '../../class/Contato.class.php';
$contato = new Contato();

$id_contato = $_POST['id_contato'];

$info = $contato->getInfo($id_contato);

?>
<strong>Editar</strong>
<hr/>
<form id="formEditar" method="POST" action="../ajax/editar_submit.php">

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


        if($('#frm_edit_nome').val() == '' ||
            typeof($('#frm_edit_nome').val()) == "undefined" ||
            $('#frm_edit_email').val() == '' ||
            typeof($('#frm_edit_email').val()) == "undefined"){

            setBoxErrorAutoHide("boxResultado","Formulario não preenchido", true);
            return false;
        }else{
            $.ajax({
                url: 'ajax/editar_submit.php',
                type: 'POST',
                data: dados,
                success: function (data) {
                    //console.info(data);
                    var dataFinal = data.split(";");
                    if (dataFinal[0] == 1) {
                        setBoxSucessoAutoHide("boxResultado", dataFinal[1], true);
                        setTimeout(function () {
                            $('#modal').modal('hide');
                            window.location.href = window.location.href;
                        }, 2000);

                    }else{
                        setBoxErrorAutoHide("boxResultado",dataFinal[1], true);
                    }

                }
            });
        }
    });

</script>