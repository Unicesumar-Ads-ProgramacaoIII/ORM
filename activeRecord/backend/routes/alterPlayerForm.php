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
$alterPlayerFormPage = file_get_contents(__DIR__ . "/../../templates/alterPlayer/index.html");
$alterPlayerFormPage = str_replace("<--id-->", $player->id, $alterPlayerFormPage);
$alterPlayerFormPage = str_replace("<--nome-->", $player->nome, $alterPlayerFormPage);
$alterPlayerFormPage = str_replace("<--email-->", $player->email, $alterPlayerFormPage);
LayoutBuilder::renderPage($alterPlayerFormPage, file_get_contents(__DIR__ . "/../../templates/navbar.html"));
