<?php

use routes\PlayerAR;

require './PlayerAR.php';
require '../../../LayoutBuilder.php';


if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    $newPlayerPage = file_get_contents(__DIR__ . "/../../templates/newPlayer/index.html");
    LayoutBuilder::renderPage($newPlayerPage, file_get_contents(__DIR__ . "/../../templates/navbar.html"));
    return;
}

$player = new PlayerAR($_POST['nome'], $_POST['email'], $_POST['senha']);
$player->save();
$successPage = file_get_contents(__DIR__ . "/../../templates/newPlayer/success.html");
$successPage = str_replace("<!--NOME-->", $player->nome, $successPage);
LayoutBuilder::renderPage($successPage, file_get_contents(__DIR__ . "/../../templates/navbar.html"));