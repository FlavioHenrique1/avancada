<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row divPrincipal col-md-12 d-flex justify-content-center">
            <div class="col">
                <div class="col-md-12 d-flex justify-content-center">
                    <h1>Formulário de Lançamento</h1>
                </div>
                <form>
                    <div class="row">
                        <div class="col">
                            <label for="exampleInputEmail1" class="form-label">Prontuário:</label>
                            <input type="text" class="form-control" placeholder="" required>
                        </div>
                        <div class="col">
                            <label class="form-label">Nome:</label>
                            <input type="text" class="form-control" placeholder="" required disabled value="Flávio">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="form-label">Nº Manga Pallet:</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col">
                            <label class="form-label">Loja:</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Dtzinhos:</label>
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
                    <input type="button" class="btn btn-success" value="Salvar">
                    <a href="index.html"class="btn btn-secondary" >Cancelar</a>
                </form>
            </div>
        </div>
    </div>
    <script src="./js/javascript.js"></script>
    <script src="./js/bootstrap.min.js"></script>
</body>
</html>
