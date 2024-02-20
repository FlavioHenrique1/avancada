<?php
$apoio=new Classes\ClassApoio();

$get=\Traits\TraitParseUrl::parseUrl(2);

$ret = "";
switch ($get) {
    case "lojas":
        $ret = $apoio->getLojas();
        break;
    case "nome":
        $pront=\Traits\TraitParseUrl::parseUrl(3);
        $ret = $apoio->getNome($pront);
        break;
    case 2:
        echo "i é igual a 2";
        break;
}

echo json_encode($ret);