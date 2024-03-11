<?php

require './PlayerAR.php';
require '../../../LayoutBuilder.php';

$players = \routes\PlayerAR::listPlayers();
$tb_rows = "";

foreach ($players as $player){
    $row = $player->toHtmlRow();
    $tb_rows .= $row;
}
$page_content = file_get_contents(__DIR__ . "/../../templates/listPlayers/index.html");
$page_content = str_replace("<!--TABLE CONTENT-->", $tb_rows, $page_content);

LayoutBuilder::renderPage($page_content, file_get_contents(__DIR__ . "/../../templates/navbar.html"));
