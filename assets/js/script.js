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
    $('#modal').modal('show');
}

function editar(id_contato){

	$.ajax({
		url:'editar.php',
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
        url:'excluir.php',
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

function fechar() {
    $('#modal').modal('hide');
}