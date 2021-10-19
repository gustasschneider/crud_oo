$(function(){

	$('.modal_ajax').on('click', function(e){
		e.preventDefault();

		$('.modal').html('Carregando...');
		$('.modal_bg').show();

		var link = $(this).attr('href');

		$.ajax({
			url:link,
			type:'GET',
			success:function(html){
				$('.modal').html(html);
			}
		});


	});

    $('#btn').on('click', function(){
        $('.modal_bg').hide();
    })

});

function adicionar(){
    $.ajax({
        url:'modal/adicionar.php',
        beforeSend: function () {
            $('#modal').find('.modal-body').html('Carregando...');
            $('#modal').modal('show');
        },
        success: function (html) {
            $('#modal').find('.modal-body').html(html);
            $('#modal').modal('show');
        }
    });
}

function editar(id_contato){

	$.ajax({
		url:'modal/editar.php',
		type:'POST',
		data:{id_contato: id_contato},
		beforeSend: function () {
			$('#modal').find('.modal-body').html('Carregando...');
            $('#modal').modal('show');
        },
		success: function (html) {
            $('#modal').find('.modal-body').html(html);
            $('#modal').modal('show');
        }
	});
}

function excluir(id_contato){
    $.ajax({
        url:'modal/excluir.php',
        type:'POST',
        data:{id_contato: id_contato},
        beforeSend: function () {
            $('#modal').find('.modal-body').html('Carregando...');
            $('#modal').modal('show');
        },
        success: function (html) {
            $('#modal').find('.modal-body').html(html);
            $('#modal').modal('show');
        }
    });
}

function ativarDesativar(id_contato, status_contato){
    $.ajax({
        url:'ajax/ativar_desativar_submit.php',
        type:'POST',
        data:{id_contato: id_contato, status_contato: status_contato},
        success: function (data) {
            console.log(data);
            var dataFinal = data.split(";");
            if (dataFinal[0] == 1) {
                setBoxSucessoAutoHide("boxResultadoIndex", dataFinal[1], true);
                setTimeout(function () {
                    $('#modal').modal('hide');
                    window.location.href = window.location.href;
                }, 2000);
            }else{
                setBoxSucessoAutoHide("boxResultadoIndex", dataFinal[1], true);
                setTimeout(function () {
                    $('#modal').modal('hide');
                    window.location.href = window.location.href;
                }, 2000);
            }

        }
    });
}

function fechar() {
    $('#modal').modal('hide');
}

function setBoxErrorAutoHide(dvID, texto, dropDown) {
    $("#" + dvID).html('<div class="alert alert-danger fade show" role="alert"><h4 class="alert-heading">Erro!</h4> ' + texto + '</div>');

    if(dropDown){
        $("#" + dvID).slideDown("fast");
    }

    setTimeout(function () {
        $("#" + dvID).slideUp("fast");
    }, 5000);
}

function setBoxSucessoAutoHide(dvID, texto, dropDown) {
    $("#" + dvID).html('<div class="alert alert-success fade show" role="alert"><h4 class="alert-heading">Tudo certo!</h4> ' + texto + '</div>');

    if(dropDown){
        $("#" + dvID).slideDown("fast");
    }

    setTimeout(function () {
        $("#" + dvID).slideUp("fast");
    }, 5000);
}