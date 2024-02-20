<?php
namespace Classes;

use Models\ClassMApoio;

class ClassApoio extends ClassMApoio{

    private $Lojas;
    private $apoio;
    private $nome;
    
    public function __construct()
    {
        $this->apoio=new ClassMApoio();
        
    }
    
    /**
     * Get the value of Lojas
     */ 
    public function getLojas()
    {
        $this->Lojas = $this->apoio->getLojas();
        return $this->Lojas;
    }

    /**
     * Get the value of nome
     */ 
    public function getNome($pront)
    {
        $retorno="";
        $this->nome = $this->apoio->getNomes($pront);
        if($this->nome['rows'] > 0 ){
            $retorno = $this->nome['data'];
        }else{
            $retorno = false;
        }
        return $retorno;
    }

}
