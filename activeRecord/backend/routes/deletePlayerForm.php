<?php

function redirectToList()
{
   header("Location: " . "/activeRecord/backend/routes/listPlayers.php");
}

if(!isset($_GET["id"])){
    redirectToList();
}

require './PlayerAR.php';
require '../../../LayoutBuilder.php';

$id = $_GET["id"];
$player = \routes\PlayerAR::listPlayers($id);
if(count($player) == 0){
    redirectToList();
}
$player = $player[0];
$deletePlayerFormPage = file_get_contents(__DIR__ . "/../../templates/deletePlayer/index.html");
$deletePlayerFormPage = str_replace("<--id-->", $player->id, $deletePlayerFormPage);
$deletePlayerFormPage = str_replace("<--nome-->", $player->nome, $deletePlayerFormPage);
$deletePlayerFormPage = str_replace("<--email-->", $player->email, $deletePlayerFormPage);
LayoutBuilder::renderPage($deletePlayerFormPage, file_get_contents(__DIR__ . "/../../templates/navbar.html"));
