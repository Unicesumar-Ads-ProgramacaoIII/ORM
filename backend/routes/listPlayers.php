<?php

require '../dataMapper/PlayerDM.php';
require '../dataMapper/DataMapper.php';
require '../LayoutBuilder.php';
use dataMapper\DataMapper;

$players = DataMapper::listPlayers();
$tb_rows = "";

foreach ($players as $player){
    $row = $player->toHtmlRow();
    $tb_rows .= $row;
}

$page_content = file_get_contents("../../templates/listPlayers/index.html");
$page_content = str_replace("<!--CONTENT-->", $tb_rows, $page_content);

LayoutBuilder::renderPage($page_content);
