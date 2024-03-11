<?php

require './PlayerAR.php';
require '../../../LayoutBuilder.php';

function returnOk($data = '')
{
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
}

if (!isset($_POST['id'])) {
    $data = "{'success': false}";
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
}
$player = \routes\PlayerAR::listPlayers($_POST['id']);
if (count($player) == 0) {
    returnOk("{'success': false}");
}
$player = $player[0];
$player->nome = $_POST['nome'];
$player->email = $_POST['email'];

$success = $player->save();
returnOk("{\"success\": " . ($success ? 'true' : 'false') . "}");
