<?php

class LayoutBuilder
{
    public static function renderPage($content)
    {
        $template = file_get_contents(__DIR__."/../templates/components/layout.html");
        $template = str_replace("<!--NAV-->", file_get_contents(__DIR__."/../templates/components/navbar.html"), $template);
        $template = str_replace("<!--CONTENT-->", $content, $template);
        echo $template;
    }
}