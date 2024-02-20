<?php \Classes\ClassLayout::setHeadRestrito("user"); ?>
<?php \Classes\ClassLayout::setHeader('Entregar', 'Entregar mangapallets', 'limpar.css'); ?>

<div class="container">
    <div class="divTabela">
        <div class="col-md-12 d-flex justify-content-center">
            <h1>Entregar Manga Pallets</h1>
        </div>
        <div class="col">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Manga:</label>
                <input type="text" class="form-control" id="manga"  tabindex="1" onkeydown="pularProximoCampo(event)" autofocus>
                <!-- <div id="emailHelp" class="form-text">Adcione o DTZINHO e de enter ate chegar no ultimo DTZINHO.</div> -->
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Local:</label>
                    <input type="text" class="form-control" id="local"  tabindex="2" onkeydown="pularProximoCampo(event)">
                    <!-- <div id="emailHelp" class="form-text">Adcione o DTZINHO e de enter ate chegar no ultimo DTZINHO.</div> -->
                </div>
            </div>
        </div>
        <div class="tdzinho" id="tdzinho"></div>
        <input type="button" class="btn btn-success" id="btnFormEntre" value="Entregar">
        <a href="<?= DIRPAGE . 'home' ?>" class="btn btn-secondary">Cancelar</a>
    </div>
</div>
</div>
<?php \Classes\ClassLayout::setFooter('entregar.js'); ?>