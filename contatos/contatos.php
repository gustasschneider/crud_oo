<?php
require_once '../class/Contato.class.php';
$contato = new Contato();
?>
<html>
<head>
    <meta charset="UTF-8" />
	<title>Site de contatos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="../assets/css/estilo.css" type="text/css"/>
    <script type="text/javascript" src="../assets/js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../assets/js/script.js"></script>
</head>
<body>

<div class="container">
    <h1 style="text-align: center">Contatos</h1>

    <button class="btn btn-success btn-lg"
            data-toggle="tooltip"
            data-placement="bottom"
            title="Cadastrar um contato!"
            style="color: white"
            onclick="adicionar();">
        Adicionar
    </button>
    <br/><br/>

    <!--div p/ deixar a tabela responsiva-->
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-sm">
            <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>E-MAIL</th>
                <th>STATUS</th>
                <th>AÇÕES</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $lista = $contato->getAll();
            foreach($lista as $item):
                $bg_color_status = "";
                $status = "";
                $displayInativo = "";
                $displayAtivo = "";
                $txtAtivoInativo = "";

                if($item['cnto_status'] == 'N'){
                    $bg_color_status = "alert-danger";
                    $status = "INATIVO";
                    $txtAtivoInativo = "Ativar";
                }else{
                    $bg_color_status = "";
                    $status = "ATIVO";
                    $txtAtivoInativo = "Desativar";
                }
                ?>
                <tr class="<?= $bg_color_status; ?>">
                    <td><?php echo $item['cnto_id']; ?></td>
                    <td><?php echo $item['cnto_nome']; ?></td>
                    <td><?php echo $item['cnto_email']; ?></td>
                    <td><?php echo $status; ?></td>
                    <td style="color: white">
                        <a class="btn btn-primary btn-sm" onclick="editar('<?= $item['cnto_id'];?>');">Editar</a>
                        <a class="btn btn-info btn-sm" onclick="ativarDesativar('<?= $item['cnto_id']; ?>', '<?= $item['cnto_status']; ?>');"><?= $txtAtivoInativo; ?></a>
                        <a class="btn btn-danger btn-sm" onclick="excluir('<?= $item['cnto_id']; ?>');">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div id="boxResultadoIndex" style="display: none;"></div>
</div>

<div id="modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">..</div>
        </div>
    </div>
</div>
</body>
</html>