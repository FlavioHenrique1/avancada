<?php \Classes\ClassLayout::setHeadRestrito("user"); ?>
<?php \Classes\ClassLayout::setHeader('Consulta', 'Consulta de Dtzinhos', 'limpar.css'); ?>
<link href="<?php echo DIRJS; ?>DataTables/datatables.min.css" rel="stylesheet">

<div class="container">
    <div class="divTabela">
        <a href="<?= DIRPAGE.'home'?>"class="btn btn-secondary" >Voltar</a>
        <div class="row col-md-12 d-flex justify-content-center divTab">
            <table class="table table-sm table-hover center" id="tabelaDtzinho">
                <thead>
                    <tr>
                        <th scope="col">Loja</th>
                        <th scope="col">Dtzinho</th>
                        <th scope="col">Data</th>
                        <th scope="col">Prontuário</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Nº Manga</th>
                        <th scope="col">Endereço Entrega</th>
                        <th scope="col">Apagar</th>
                    </tr>
                </thead>
                <tbody id="tabelaBody" class="tabelaBody">
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<script src="<?php echo DIRJS; ?>jquery-3.6.4.min.js"></script>
<script src="<?php echo DIRJS; ?>DataTables/datatables.min.js"></script>
<?php \Classes\ClassLayout::setFooter('consulta.js'); ?>