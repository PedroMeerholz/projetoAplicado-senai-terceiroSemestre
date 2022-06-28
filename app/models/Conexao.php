<?php

namespace app\models;

use \PDOException;

class Conexao
{
    private $nomeDataBase = 'mysql:host=database-projetoaplicado.cn1rl4lmn61c.us-east-1.rds.amazonaws.com;dbname=projetosenai';
    private $usuario = 'admin';
    private $senha = '89601311';

    public function realizaConexao()
    {
        try {
            $conexao = new \PDO($this->nomeDataBase, $this->usuario, $this->senha);
            $conexao->exec('set names utf8');
            return $conexao;
        } catch(\PDOException $erro) {
            echo $erro->getMessage();
        }
    }
}