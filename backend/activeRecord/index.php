<?php

$template = file_get_contents("../../frontend/listPlayers/index.html");

$template = str_replace("<!--Teste-->", "OI, Active Record", $template);

echo $template;