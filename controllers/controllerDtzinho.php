<?php 
$data = json_decode(file_get_contents('php://input'), true);
$lanc=new Classes\ClassDtzinho();

// Verificar o método HTTP da requisição
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Consultar todos os eventos
    $retorno=$lanc->getDtz();
    echo json_encode($retorno);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Inserir um novo evento
    $retorno=$lanc->setManga($data);
    echo json_encode($retorno);

} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    // Editar um evento existente
    $retorno=$lanc->editDtzinho($data);
    echo json_encode($data);
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $retorno=$lanc->delDtzinho($data["dtzinho"]);
    echo json_encode($data);
}