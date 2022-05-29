<?php

namespace app\models;

use \PDOException;

class Conexao
{
    private $nomeDataBase = 'mysql:host=localhost;dbname=projetosenai';
    private $usuario = 'root';
    private $senha = '';

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