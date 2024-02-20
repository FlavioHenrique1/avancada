<?php
namespace Models;

class ClassMDtzinho extends ClassCrud{

    #Realizar a inserção no banco de dados
    public function inserManga($arrVar)
    {
        $this->insertDB(
            "mangaPallet",
            "?,?,?,?",
            array(
                0,
                $arrVar['manga'],
                $arrVar['loja'],
                'a'
                
            )
        );
    }
    
    #Realizar a inserção no banco de dados
    public function inserDtzinho($arrVar,$status)
    {
        $dataCreate=date("Y-m-d H:i:s");
        // Loop através de cada item no array
        foreach ($arrVar['Dts'] as $item) {            
            $this->insertDB(
                "dtzinho",
                "?,?,?,?,?,?,?,?",
                array(
                    0,
                    $item,
                    $arrVar['loja'],
                    $dataCreate,
                    $arrVar['manga'],
                    $arrVar['pront'],
                    $status,
                    ""
                )
            );
        }
        $this->UpdateStatusManga($arrVar['manga'],"a",$arrVar['loja']);
    }

    #Retorna os nomes dos usuarios
    public function getDtzinho($nDtz=null)
    {
        if($nDtz == null){
            $b=$this->selectDB(
                "*",
                "dtzinho A",
                "INNER JOIN associado B ON A.n_pront = B.n_pront
                INNER JOIN lojas C ON A.v_loja = C.id
                ",
                array(
                )
            );
        }else{
            $b=$this->selectDB(
                "*",
                "dtzinho",
                "WHERE n_dtzinho=?",
                array(
                    $nDtz
                )
            );
        }
        $f=$b->fetchAll(\PDO::FETCH_ASSOC);
        $r=$b->rowCount();
        return $arrData=[
            "data"=>$f,
            "rows"=>$r
        ];
    }

    #Retorna os nomes dos usuarios
    public function getStatusManga($nManga)
    {
        $b=$this->selectDB(
            "*",
            "mangapallet",
            "WHERE n_manga=?",
            array(
                $nManga
            )
        );
        $f=$b->fetch(\PDO::FETCH_ASSOC);
        $r=$b->rowCount();
        return $arrData=[
            "data"=>$f,
            "rows"=>$r
        ];
    }
    #Retorna os nomes dos usuarios
    public function getManga($status)
    {
        $b=$this->selectDB(
            "*",
            "mangapallet",
            "WHERE c_status=?",
            array(
                $status
            )
        );
        $f=$b->fetchAll(\PDO::FETCH_ASSOC);
        $r=$b->rowCount();
        return $arrData=[
            "data"=>$f,
            "rows"=>$r
        ];
    }

    #Setar o status do manga
    public function UpdateStatusManga($nManga,$status,$loja=null)
    {
        if($loja == null){
            $b=$this->updateDB(
                "mangapallet",
                "c_status=?",
                "n_manga=?",
                array(
                    $status,
                    $nManga
                )
            );
        }else{
            $b=$this->updateDB(
                "mangapallet",
                "c_status=? , n_loja=?",
                "n_manga=?",
                array(
                    $status,
                    $loja,
                    $nManga
                )
            );
        }
    }
    public function deleteDtzinho($nDtzinho)
    {
        $this->deleteDB(
            "dtzinho",
            "n_dtzinho=?",
            array(
                $nDtzinho
            )
        );
    }

    #Setar o status do manga
    public function editarDtzinho($id,$campo,$valor)
    {
        $b=$this->updateDB(
            "dtzinho",
            $campo."=?",
            "n_dtzinho=?",
            array(
                $valor,
                $id
            )
        );
    }

    #Retorna os nomes dos usuarios
    public function getDtzManga($manga)
    {
        $b = $this->selectDB(
            "*",
            "dtzinho ",
            "WHERE n_manga=? and status=?",
            array(
                $manga,
                "a"
            )
        );

        $f = $b->fetchAll(\PDO::FETCH_ASSOC);
        $r = $b->rowCount();
        return $arrData = [
            "data" => $f,
            "rows" => $r
        ];
    }

}