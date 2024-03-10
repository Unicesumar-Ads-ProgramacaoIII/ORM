<?php

require '../dataMapper/DataMapper.php';
require '../../LayoutBuilder.php';

use routes\dataMapper\DataMapper;

if(!isset($_GET['id'])){
    header("Location: " . "/backend/routes/dataMapper/listPlayers.php");
}

$success = DataMapper::deletePlayer($_GET['id']);
$page = file_get_contents(__DIR__.($success ? "/../../../templates/deletePlayer/success.html" : "/../../../templates/components/error404.html"));
LayoutBuilder::renderPage($page);
