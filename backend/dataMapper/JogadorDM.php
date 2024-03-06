<?php

namespace dataMapper;

class JogadorDM
{
    public $id;
    public $email;
    private $senha;
    public $data_cadastro;

    public function __construct($id, $email, $senha, $data_cadastro)
    {
        $this->id = $id;
        $this->email = $email;
        $this->senha = $senha;
        $this->data_cadastro = $data_cadastro;
    }

    static function toHtmlRow()
    {
        return '<tr></tr>';
    }
}

class DataMapper
{
    public static function listPlayers($id = null)
    {
        $query = 'SELECT * FROM tb_jogadores';
        if(isset($id)){
            $query .= " WHERE id = $id";
        }
        $db = \Connection::getInstance();
        $stmt = $db->prepare($query);
        $stmt->execute();
        $response = $stmt->fetchAll();
        return $response;

    }

//    private static function
}