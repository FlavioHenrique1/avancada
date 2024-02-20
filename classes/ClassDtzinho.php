<?php
namespace Classes;

use Models\ClassMDtzinho;

class ClassDtzinho extends ClassMDtzinho{

    private $manga;
    private $dtz;
    private $lanc;
    private $erro=[];
    
    public function __construct()
    {
        $this->lanc=new ClassMDtzinho();
        
    }

    //Validar se o manga esta cadastrado e ativo
    public function statusManga($nManga){
        $t=$this->lanc->getStatusManga($nManga);
        return $t;
    }

    //Validar se o manga esta cadastrado e ativo
    public function setStatusManga($nManga,$status){
        $t=$this->lanc->UpdateStatusManga($nManga,$status);
        return $t;
    }

    /**
     * Get the value of manga 
     */ 
    public function getManga($status)
    {
        $this->manga=$this->lanc->getManga($status);
        return $this->manga;
    }

    /**
     * Set the value of manga
     */ 
    public function setManga($manga)
    {
        $status=$this->statusManga($manga['manga']);
        foreach ($manga['Dts'] as $item) {            
            $this->getDtz($item);
        }
        //Verificar se o manga esta ativo
        if($status['rows'] == 0 ){
            $this->lanc->inserManga($manga);
        }else if($status['data']['c_status'] == "a" and $status['data']['n_loja'] != $manga['loja']){
            $this->setErro("Manga ja esta ativo com outros dtzinhos de outras de outra loja!");
        }

        //verificar se tem erro no array para executar o lançamento
        if(count($this->getErro())>0){
            $arrResponse=[
                "retorno"=>"erro",
                "erros"=>$this->getErro()
            ];
        }else{
            $this->setDtz($manga,"a");
            $arrResponse=[
                "retorno"=>"success",
                "erros"=>null
            ];
        }
        return $arrResponse;
    }

    /**
     * Get the value of dtz
     */ 
    public function getDtz($nDtz=null,$consult=false)
    {
        $ret = $this->getDtzinho($nDtz);
        if($ret['rows'] != 0 and $consult==false){
            $this->setErro("Dtzinho: ".$nDtz." ja cadastrado no manga: " .$ret['data'][0]['n_manga'] );
        }
        return $ret;
    }

    /**
     * Set the value of dtz
     */ 
    public function setDtz($dtz,$status)
    {
        $this->inserDtzinho($dtz,$status);
        return $this;
    }

    /**
     * Get the value of erro
     */ 
    public function getErro()
    {
        return $this->erro;
    }

    /**
     * Set the value of erro
     *
     */ 
    public function setErro($erro)
    {
        array_push($this->erro,$erro);
    }

     /**
     * Set the value of erro
     *
     */ 
    public function delDtzinho($ndtzinho)
    {
        $this->deleteDtzinho($ndtzinho);
    }

    /**
     * Set the value of erro
     *
     */ 
    public function editDtzinho($dados)
    {
        $id=$dados['id'];
        $valor=$dados['valor'];
        $campo="";
        switch ($dados['campo']) {
            case '2':
                $campo="data";
                // Data no formato brasileiro
                $data_brasileira = $valor;

                // Cria um objeto DateTime a partir da data brasileira
                $data_obj = date_create_from_format('d/m/Y', $data_brasileira);

                // Verifica se a conversão foi bem-sucedida
                if ($data_obj) {
                    // Formata a data no formato americano
                    $valor = date_format($data_obj, 'Y-m-d H:i:s');

                    // Exibe a data no formato americano
                    // echo "Data americana: " . $valor;
                } else {
                    // Exibe uma mensagem de erro se a conversão falhou
                    // echo "Erro na conversão da data brasileira.";
                }
                break;
            case '3':
                $campo="n_pront";
                break;
            case '5':
                $campo="n_manga";
                break;
        }

        $this->editarDtzinho($id,$campo,$valor);
    }
    public function entregarManga($dados){
        $manga=$dados['numMangas'];
        $local=$dados['local'];

        $ret=$this->getDtzManga($manga);
        if($ret["rows"]== 0 ){
            $this->setErro("Erro ao entregar Manga!");
        }
        //verificar se tem erro no array para executar o lançamento
        if(count($this->getErro())>0){
            $arrResponse=[
                "retorno"=>"erro",
                "erros"=>$this->getErro()
            ];
        }else{
            foreach ($ret["data"] as $key => $value) {
                $this->editarDtzinho($value["n_dtzinho"],"status","i");
                $this->editarDtzinho($value["n_dtzinho"],"endereco",$local);
            }
            $arrResponse=[
                "retorno"=>"success",
                "erros"=>null
            ];
        }
        return $arrResponse;
    }
    
}