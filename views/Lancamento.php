<?php \Classes\ClassLayout::setHeadRestrito("user");?>
<?php \Classes\ClassLayout::setHeader('Lançamento','Lançamento de Dt');?>

    <div class="container">
        <div class="row divPrincipal col-md-12 d-flex justify-content-center">
            <div class="col">
                <div class="col-md-12 d-flex justify-content-center">
                    <h1>Formulário de Lançamento</h1>
                </div>
                <form name="formLanc" id="formLanc">
                    <div class="row">
                        <div class="col">
                            <label for="exampleInputEmail1" class="form-label">Prontuário:</label>
                            <input type="text" class="form-control" placeholder="" required name="pronutuario" id="pronutuario">
                        </div>
                        <div class="col">
                            <label class="form-label">Nome:</label>
                            <input type="text" class="form-control" placeholder="" required disabled id="nome" name="nome">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="form-label">Nº Manga Pallet:</label>
                            <input type="text" class="form-control" placeholder="" id="manga" name="manga">
                        </div>
                        <div class="col">
                            <label class="form-label">Loja:</label>
                            <input type="text" class="form-control" placeholder="" id="LojasForm" name="loja">
                        </div>
                        <div class="col">
                            <div class="divNumFor">
                                <label class="form-label">Qtd Dtzinho:</label>
                                <h3 id="qtdFormDt">0</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Dtzinhos:</label>
                                <input type="number" class="form-control" id="dtInput" aria-describedby="emailHelp">
                                <!-- <div id="emailHelp" class="form-text">Adcione o DTZINHO e de enter ate chegar no ultimo DTZINHO.</div> -->
                            </div>
                        </div>
                        <!-- <div class="col">
                            <div class="numeroFor">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">QTD:</label>
                                    <h3>10</h3>
                                    <input type="text" class="form-control" id="dtInput" aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text">Adcione o DTZINHO e de enter ate chegar no ultimo DTZINHO.</div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <div class="tdzinho" id="tdzinho"></div>
                    <input type="button" class="btn btn-success" id="btnFormLanc" value="Salvar">
                    <a href="<?= DIRPAGE.'home'?>"class="btn btn-secondary" >Cancelar</a>
                </form>
            </div>
        </div>
    </div>
<?php \Classes\ClassLayout::setFooter('lancamento.js');?>
