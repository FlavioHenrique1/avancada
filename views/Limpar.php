<?php \Classes\ClassLayout::setHeadRestrito("user"); ?>
<?php \Classes\ClassLayout::setHeader('Limpar', 'Limpar mangapallets', 'limpar.css'); ?>

<div class="container">
    <div class="divTabela">
        <div class="col-md-12 d-flex justify-content-center">
            <h1>Limpar Manga Pallets</h1>
        </div>

        <div class="col">
            <div class="divNumFor">
                <label class="form-label">Qtd Mangas:</label>
                <h3 id="qtdFormDt">0</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Mangas:</label>
                    <input type="text" class="form-control" id="dtInput" aria-describedby="emailHelp">
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
        <input type="button" class="btn btn-success" id="btnFormLanc" value="Limpar">
        <a href="<?= DIRPAGE . 'home' ?>" class="btn btn-secondary">Cancelar</a>
    </div>
</div>
</div>
<?php \Classes\ClassLayout::setFooter('limpar.js'); ?>