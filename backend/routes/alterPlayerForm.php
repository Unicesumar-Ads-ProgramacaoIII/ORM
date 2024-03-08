<?php

function redirectToList()
{
   header("Location: " . "/backend/routes/listPlayers.php");
}

if(!isset($_GET["id"])){
    redirectToList();
}

require '../dataMapper/PlayerDM.php';
require '../dataMapper/DataMapper.php';
require '../LayoutBuilder.php';
use dataMapper\DataMapper;

$id = $_GET["id"];
$player = DataMapper::listPlayers($id);
if(count($player) == 0){
    redirectToList();
}
$player = $player[0];
$alterPlayerFormPage = file_get_contents("../../templates/alterPlayer/index.html");
$alterPlayerFormPage = str_replace("<--id-->", $player->id, $alterPlayerFormPage);
$alterPlayerFormPage = str_replace("<--nome-->", $player->nome, $alterPlayerFormPage);
$alterPlayerFormPage = str_replace("<--email-->", $player->email, $alterPlayerFormPage);
LayoutBuilder::renderPage($alterPlayerFormPage);
