<?php

use dataMapper\PlayerDM;

require '../dataMapper/PlayerDM.php';
require '../dataMapper/DataMapper.php';
require '../LayoutBuilder.php';

$newPlayerPage = file_get_contents("../../templates/newPlayer/index.html");

if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    LayoutBuilder::renderPage($newPlayerPage);
    return;
}

$player = \dataMapper\DataMapper::createPlayer($_POST['nome'], $_POST['email'], $_POST['senha']);
$successPage = file_get_contents("../../templates/newPlayer/success.html");
$successPage = str_replace("<!--NOME-->", $player->nome, $successPage);
LayoutBuilder::renderPage($successPage);