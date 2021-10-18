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

function ativar(id_contato){
    $.ajax({
        url:'ajax/ativar.php',
        type:'POST',
        data:{id_contato: id_contato},
        success: function () {
            setBoxSucessoAutoHide("boxResultadoIndex","Contato ATIVADO.", true);
            setTimeout(function () {
                $('#modal').modal('hide');
                window.location.href = window.location.href;
            }, 2000);
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