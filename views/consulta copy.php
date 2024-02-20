<?php \Classes\ClassLayout::setHeadRestrito("user");?>
<?php \Classes\ClassLayout::setHeader('Área Restrita','Exclusivos para membros','limpar.css');?>
    <link href="<?php echo DIRJS;?>DataTables/datatables.min.css" rel="stylesheet">
 
    <div class="container">
        <div class="divTabela">
            <form>
                <div class="row">
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radioPesq" id="manga"
                                checked>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Nº Manga Pallet:
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radioPesq" id="data">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Data:
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radioPesq" id="loja">
                            <label class="form-check-label" for="flexRadioDefault3">
                                Loja:
                            </label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radioPesq" id="dtzinho">
                            <label class="form-check-label" for="flexRadioDefault4">
                                Dtzinhos:
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radioPesq" id="usuario">
                            <label class="form-check-label" for="flexRadioDefault5">
                                Usuário:
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="mb-8">
                            <input type="text" class="form-control" id="filtCon" aria-describedby="emailHelp"
                            placeholder="Digite o valor para pesquisa:">
                        </div>
                        <div class="form-check">
                            <div class="Marcar">                                
                                <input class="form-check-input" type="checkbox" value="" id="CheckMarcarTodos">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Marcar todos
                                </label>
                                <div class="BtnLimparTodos" id="BtnLimparTodos">
                                    Limpar Todos
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-8">
                            <!-- <input type="button" class="btn btn-success" value="Pesquisar"> -->
                            <a href="<?php echo DIRPAGE.'home';?>" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </div>
            </form>
        </div>
        <div class="row col-md-12 d-flex justify-content-center divTab">
            <table class="table table-sm table-hover center" id="tabelaDtzinho">
                <thead>
                    <tr>
                        <!-- <th scope="col">#</th> -->
                        <!-- <th scope="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                            </div>
                        </th>     -->
                        <th scope="col">Loja</th>
                        <th scope="col">Dtzinho</th>
                        <th scope="col">Data</th>
                        <th scope="col">Prontuário</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Nº Manga</th>
                        <th scope="col">Apagar</th>
                        <th scope="col">Editar</th>
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
    <script src="<?php echo DIRJS;?>jquery-3.6.4.min.js"></script>
    <script src="<?php echo DIRJS;?>DataTables/datatables.min.js"></script>
<?php \Classes\ClassLayout::setFooter('consulta.js');?>