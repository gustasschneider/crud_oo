<?php
include 'contato.class.php';
$contato = new Contato();
?>
<html>
<head>
    <meta charset="UTF-8" />
	<title>Site de contatos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="assets/js/bootstrap.min.css"/>
	<link rel="stylesheet" href="assets/css/estilo.css" type="text/css"/>
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/script.js"></script>
</head>
<body>

<h1 style="text-align: center">Contatos</h1>

<a href="javascript:;" onclick="adicionar();">[ ADICIONAR ]</a><br/><br/>

<table border="1" width="500" style="text-align: center">
	<tr>
		<th>ID</th>
		<th>NOME</th>
		<th>E-MAIL</th>
		<th>AÇÕES</th>
	</tr>

	<?php
	$lista = $contato->getAll();
	foreach($lista as $item):
	?>
	<tr>
		<td><?php echo $item['cnto_id']; ?></td>
		<td><?php echo $item['cnto_nome']; ?></td>
		<td><?php echo $item['cnto_email']; ?></td>
		<td>
			<a href="javascript:;" onclick="editar('<?= $item['cnto_id'];?>');">[ EDITAR ]</a>
			<a href="javascript:;" onclick="excluir('<?= $item['cnto_id'];?>');">[ EXCLUIR ]</a>
		</td>
	</tr>
	<?php endforeach; ?>

</table>

<div id="modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">..</div>
        </div>
    </div>
</div>

</body>
</html>