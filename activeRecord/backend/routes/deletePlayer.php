<?php

require './PlayerAR.php';
require '../../../LayoutBuilder.php';


if(!isset($_GET['id'])){
    header("Location: " . "/activeRecord/backend/routes/listPlayers.php");
}

$player = \routes\PlayerAR::listPlayers($_GET['id']);
$player = $player[0];
$success = $player->delete();
$page = file_get_contents(__DIR__.($success ? "/../../templates/deletePlayer/success.html" : "/../../templates/deletePlayer/error404.html"));
LayoutBuilder::renderPage($page, file_get_contents(__DIR__ . "/../../templates/navbar.html"));
