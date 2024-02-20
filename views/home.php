<?php \Classes\ClassLayout::setHeadRestrito("user");?>
<?php \Classes\ClassLayout::setHeader('Home','Pagina inicial');?>

    <div class="container">
        <div class="row divPrincipal col-md-12 d-flex justify-content-center">
            <div class="col">
                <div class="col-md-12 d-flex justify-content-center">
                    <h1>Controle de Dtzinho</h1>
                </div>
                <div class="Cards">
                    <div class="card" style="width: 16rem;">
                        <a href="<?php echo DIRPAGE.'Lancamento';?>">
                            <div class="card-body">
                                <div class="imgDivCar">
                                    <img src="<?= DIRIMG.'add.svg';?>" class="imgCard">
                                </div>
                              <h6>Lançar Dtzinhos no Manga Pallet</h6>
                            </div>
                        </a>
                    </div>
                    <div class="card" style="width: 16rem;">
                        <a href="<?php echo DIRPAGE.'consulta';?>">
                            <div class="card-body">
                                <div class="imgDivCar">
                                    <img src="<?= DIRIMG.'pesq.svg';?>" class="imgCard">
                                </div>
                            <h6>Pesquisar Dtzinhos no Manga Pallet</h6>
                            </div>
                        </a>
                    </div>
                    <div class="card" style="width: 16rem;">
                        <a href="<?php echo DIRPAGE.'limpar';?>">
                            <div class="card-body">
                                <div class="imgDivCar">
                                    <img src="<?= DIRIMG.'limpar.svg';?>" class="imgCard">
                                </div>
                            <h6>Limpar Manga Pallet</h6>
                            </div>
                        </a>
                    </div>
                    <div class="card" style="width: 16rem;">
                        <a href="<?php echo DIRPAGE.'entregar';?>">
                            <div class="card-body">
                                <div class="imgDivCar">
                                    <img src="<?= DIRIMG.'deliver.svg';?>" class="imgCard">
                                </div>
                            <h6>Entregar Manga Pallet</h6>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php \Classes\ClassLayout::setFooter();?>
