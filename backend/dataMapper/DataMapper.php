<?php

namespace dataMapper;

class DataMapper
{
    public static function listPlayers($id = null)
    {
        $query = 'SELECT * FROM tb_jogadores';
        if (isset($id)) {
            $query .= " WHERE id = $id";
        }
        $db = \Connection::getInstance();
        $stmt = $db->prepare($query);
        $stmt->execute();
        $players_db = $stmt->fetchAll();
        $players = [];
        foreach ($players_db as $player_db) {
            list('id' => $id, 'nome' => $nome, 'email' => $email, 'data_cadastro' => $data_cadastro, 'senha' => $senha) = $player_db;
            array_push($players, new PlayerDM($id, $nome, $email, $senha, $data_cadastro));

        }
        return $players;

    }
}