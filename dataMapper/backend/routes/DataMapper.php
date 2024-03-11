<?php

namespace routes;

require_once '../../../Connection.php';

use DateTime;

class DataMapper
{
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
            array_push($players, new PlayerDM($id, $nome, $email, $senha, $data_cadastro));
        }
        return $players;
    }

    public static function createPlayer($name, $email, $senha)
    {
        $db = \Connection::getInstance();
        $date = new DateTime();
        $data_cadastro = $date->format("Y-m-d H:i:s");
        $stmt = $db->prepare('INSERT INTO tb_jogadores (nome, email, senha, data_cadastro) VALUES (:name, :email, :senha,:data_cadastro)');
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->bindParam(':data_cadastro', $data_cadastro);
        $stmt->execute();
        return new PlayerDM($db->lastInsertId(), $name, $email, $senha, $data_cadastro);
    }

    public static function deletePlayer($id)
    {
        $db = \Connection::getInstance();
        $stmt = $db->prepare('DELETE FROM tb_jogadores WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    public static function updatePlayer($id, $name, $email)
    {
         $db = \Connection::getInstance();
         $stmt = $db->prepare('UPDATE tb_jogadores
             set nome = :nome, email = :email
         WHERE id = :id');
         $stmt->bindParam(':id', $id);
         $stmt->bindParam(':nome', $name);
         $stmt->bindParam(':email', $email);
         $stmt->execute();
         return $stmt->rowCount() > 0;
    }
}
