<?php

namespace routes;

require_once '../../../Connection.php';

class PlayerAR
{
    public $id;
    public $nome;
    public $email;
    private $senha;
    public $data_cadastro;

    public function __construct($nome, $email, $senha, $data_cadastro = null, $id = null)
    {
        if (isset($id)) {
            $this->id = $id;
        }
        $this->email = $email;
        $this->nome = $nome;
        $this->senha = $senha;
        if(isset($data_cadastro)){
            $this->data_cadastro = $data_cadastro;
        }
    }

    function toHtmlRow()
    {
        return "<tr>
            <td>$this->id</td>
            <td>$this->nome</td>
            <td>$this->email</td>
            <td>$this->data_cadastro</td>
            <td><a href='/activeRecord/backend/routes/alterPlayerForm.php/?id=$this->id'> - </a></td>
            <td><a href='/activeRecord/backend/routes/deletePlayerForm.php/?id=$this->id'><0></a></td>
        </tr>";
    }

    public static function listPlayers($id = null)
    {
        $query = 'SELECT * FROM tb_jogadores';
        if (isset($id)) {
            $query .= " WHERE id = :id";
        }
        $db = \Connection::getInstance();
        $stmt = $db->prepare($query);
        if (isset($id)) {
            $stmt->bindParam(':id', $id);
        }
        $stmt->execute();
        $players_db = $stmt->fetchAll();
        $players = [];
        foreach ($players_db as $player_db) {
            list('id' => $id, 'nome' => $nome, 'email' => $email, 'data_cadastro' => $data_cadastro, 'senha' => $senha) = $player_db;
            array_push($players, new PlayerAR($nome, $email, $senha, $data_cadastro, $id));
        }
        return $players;
    }

    public function save()
    {
        if (isset($this->id)) {
            return $this->update();
        }
        return $this->insert();

    }

    private function insert()
    {
        $db = \Connection::getInstance();
        $date = new \DateTime();
        $data_cadastro = $date->format("Y-m-d H:i:s");
        $stmt = $db->prepare('INSERT INTO tb_jogadores (nome, email, senha, data_cadastro) VALUES (:nome, :email, :senha,:data_cadastro)');
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':senha', $this->senha);
        $stmt->bindParam(':data_cadastro', $data_cadastro);
        $success = $stmt->execute();
        $this->id = $db->lastInsertId();
        return $success;
    }

    private function update()
    {
        $db = \Connection::getInstance();
        $stmt = $db->prepare('UPDATE tb_jogadores
            set nome = :nome, email = :email
        WHERE id = :id');
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':id', $this->id);
        return $stmt->execute();
    }

    public function delete()
    {
        if (!isset($this->id)) {
            return false;
        }
        $db = \Connection::getInstance();
        $stmt = $db->prepare('DELETE FROM tb_jogadores WHERE id = :id');
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

}
