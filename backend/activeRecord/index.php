<?php

$template = file_get_contents(__DIR__."/../../templates/listPlayers/index.html");

$template = str_replace("<!--Teste-->", "OI, Active Record", $template);

echo $template;