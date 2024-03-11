<?php

class LayoutBuilder
{
    public static function renderPage($content, $navBar = null)
    {

        $template = file_get_contents(__DIR__ . "/components/layout.html");
        if($navBar != null){
            $template = str_replace("<!--NAV-->", $navBar, $template);
        }
        $template = str_replace("<!--CONTENT-->", $content, $template);
        echo $template;
    }
}