<?php
namespace Models;

class ClassMApoio extends ClassCrud{

    #Retorna as lojas
    public function getLojas()
    {
        $b=$this->selectDB(
            "*",
            "lojas",
            "",
            array(
            )
        );
        $f=$b->fetchAll(\PDO::FETCH_ASSOC);
        return $f;
    }

    #Retorna os nomes dos usuarios
    public function getNomes($pront)
    {
        $b=$this->selectDB(
            "v_nome",
            "associado",
            "WHERE n_pront=?",
            array(
                $pront
            )
        );
        $f=$b->fetch(\PDO::FETCH_ASSOC);
        $r=$b->rowCount();
        return $arrData=[
            "data"=>$f,
            "rows"=>$r
        ];
    }

    #Retorna os Dtzinhos
    public function getDtz()
    {
        $b=$this->selectDB(
            "*",
            "dtzinho",
            "",
            array(
            )
        );
        $f=$b->fetchAll(\PDO::FETCH_ASSOC);
        return $f;
    }

}