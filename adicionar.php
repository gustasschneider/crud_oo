<script type="text/javascript" src="assets/js/script.js"></script>

<strong>Adicionar</strong>
<hr/>
<form method="POST" id="frmAdicionar" action="adicionar_submit.php">

    <div class="form-group">
        <label for="frm_add_nome">Nome:</label>
        <input class="form-control" type="text" id="frm_add_nome" name="frm_add_nome"/>
    </div>

    <div class="form-group">
        <label for="frm_add_email">E-mail:</label>
        <input class="form-control" type="email" id="frm_add_email" name="frm_add_email"/>
    </div>

	<input type="submit" class="btn btn-primary btn-block" value="Adicionar" />
</form>
<div id="boxResultado" style="display: none;"></div>
<script type="text/javascript">

    $('#modal').find('.modal-body').find('form').on('submit', function (e) {
        e.preventDefault();

        var dados = $("#frmAdicionar").serialize();

        if($('#frm_add_nome').val() == '' ||
            typeof($('#frm_add_nome').val()) == "undefined" ||
            $('#frm_add_email').val() == '' ||
            typeof($('#frm_add_email').val()) == "undefined"){

            setBoxErrorAutoHide("boxResultado","Formulario não preenchido", true);
            return false;
        }else{
            $.ajax({
                url: 'adicionar_submit.php',
                type: 'POST',
                data: dados,
                success: function (data) {
                    //console.info(data);
                    setBoxSucessoAutoHide("boxResultado","Contato cadastrado com sucesso.", true);
                    setTimeout(function () {
                        $('#modal').modal('hide');
                        window.location.href = window.location.href;
                    }, 2000);
                }
            });
        }
    });


</script>