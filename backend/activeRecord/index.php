<?php

$template = file_get_contents("../../templates/listPlayers/index.html");

$template = str_replace("<!--Teste-->", "OI, Active Record", $template);

echo $template;