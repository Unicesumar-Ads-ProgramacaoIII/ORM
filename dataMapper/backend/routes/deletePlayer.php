<?php

require './DataMapper.php';
require '../../../LayoutBuilder.php';

use routes\DataMapper;

if(!isset($_GET['id'])){
    header("Location: " . "/dataMapper/backend/routes/listPlayers.php");
}

$success = DataMapper::deletePlayer($_GET['id']);
$page = file_get_contents(__DIR__.($success ? "/../../templates/deletePlayer/success.html" : "/../../templates/deletePlayer/error404.html"));
LayoutBuilder::renderPage($page, file_get_contents(__DIR__ . "/../../templates/navbar.html"));
