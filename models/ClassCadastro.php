<?php
namespace Models;

class ClassCadastro extends ClassCrud{

    #Realizar a inserção no banco de dados
    public function inserCad($arrVar)
    {
        $this->insertDB(
            "users",
            "?,?,?,?,?,?,?,?,?",
            array(
                0,
                $arrVar['nome'],
                $arrVar['prontuario'],
                $arrVar['hashSenha'],
                $arrVar['dataNascimento'],
                $arrVar['dataCreate'],
                'user',
                'ativo',
                $arrVar['dataCreate']
            )
        );
    }

    #Veriricar se já existe o mesmo email cadastro no db
    public function getIssetProntuario($prontuario)
    {
        $b=$this->selectDB(
            "*",
            "users",
            "where prontuario=?",
            array(
                $prontuario
            )
        );

        return $r=$b->rowCount();
    }

    #Verificar a confirmação de cadastro pelo email
    public function confirmationCad($email,$token)
    {
        $b=$this->selectDB(
            "*",
            "confirmation",
            "WHERE email=? and token=?",
            array(
                $email,
                $token
            )
        );
        $r=$b->rowCount();
        if($r >0){
            $this->deleteDB(
                "confirmation",
                "email=?",
                array($email)
            );
        
            $this->updateDB(
                "users",
                "status=?",
                "email=?",
                array(
                    "active",
                    $email
                )
            );
            return true;
        }else{
            return false;
        }
    }

    #Verificar a confirmação de senha
    public function confirmationPront($prontuario,$token,$hashSenha)
    {
        $b=$this->selectDB(
            "*",
            "confirmation",
            "where prontuario=? and token=?",
            array(
                $prontuario,
                $token
            )
        );
        $r=$b->rowCount();

        if($r >0){
            $this->deleteDB(
                "confirmation",
                "prontuario=?",
                array($prontuario)
            );

            $this->updateDB(
                "users",
                "senha=?",
                "prontuario=?",
                array(
                    $hashSenha,
                    $prontuario
                )
            );
            return true;
        }else{
            return false;
        }
    }

    #Verificar a confirmação de senha
    public function alterarSenha($prontuario,$hashSenha,$dataN)
    {
        $b=$this->selectDB(
            "*",
            "users",
            "where prontuario=? and dataNascimento=?",
            array(
                $prontuario,
                $dataN
            )
        );
        $r=$b->rowCount();
            if($r >0){
                $this->updateDB(
                    "users",
                    "senha=?",
                    "prontuario=?",
                array(
                    $hashSenha,
                    $prontuario
                    )
                );
                return true;
            }else{
                return false;
            }

    }


}