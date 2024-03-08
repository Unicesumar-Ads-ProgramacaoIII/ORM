<?php
//TODO THIS IS A BAD IDEA!!!! its a public route that just deletes things

require '../dataMapper/DataMapper.php';
require '../LayoutBuilder.php';
use dataMapper\DataMapper;

if(!isset($_GET['id'])){
    header("Location: " . "/backend/routes/listPlayers.php");
}

$success = DataMapper::deletePlayerById($_GET['id']);
$page = file_get_contents($success ? "../../templates/deletePlayer/success.html" : "../../templates/deletePlayer/error.html");
LayoutBuilder::renderPage($page);
