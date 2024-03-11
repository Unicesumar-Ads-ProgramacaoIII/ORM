<?php

function redirectToList()
{
   header("Location: " . "/dataMapper/backend/routes/listPlayers.php");
}

if(!isset($_GET["id"])){
    redirectToList();
}

require './PlayerDM.php';
require './DataMapper.php';
require '../../../LayoutBuilder.php';

use routes\DataMapper;

$id = $_GET["id"];
$player = DataMapper::listPlayers($id);
if(count($player) == 0){
    redirectToList();
}
$player = $player[0];
$deletePlayerFormPage = file_get_contents(__DIR__ . "/../../templates/deletePlayer/index.html");
$deletePlayerFormPage = str_replace("<--id-->", $player->id, $deletePlayerFormPage);
$deletePlayerFormPage = str_replace("<--nome-->", $player->nome, $deletePlayerFormPage);
$deletePlayerFormPage = str_replace("<--email-->", $player->email, $deletePlayerFormPage);
LayoutBuilder::renderPage($deletePlayerFormPage, file_get_contents(__DIR__ . "/../../templates/navbar.html"));
