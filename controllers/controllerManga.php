<?php 
$data = json_decode(file_get_contents('php://input'), true);
$lanc=new Classes\ClassDtzinho();

// Verificar o método HTTP da requisição
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Consultar todos os eventos
    $retorno=$lanc->getManga("a");
    echo json_encode($retorno);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Inserir um novo evento
    $retorno=$lanc->entregarManga($data);
    echo json_encode($retorno);
} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    // Editar um evento existente
    $retorno=$lanc->setStatusManga($data['manga'],"i");
    echo json_encode($retorno);

} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Deletar um evento existente
    foreach ($data['Dts'] as $valor) {
        $retorno=$lanc->setStatusManga($valor,"i");
    }
    echo json_encode($retorno);
}