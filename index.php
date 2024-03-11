<?php

require './LayoutBuilder.php';

$page_content = file_get_contents(__DIR__ . "/selector.html");
LayoutBuilder::renderPage($page_content);