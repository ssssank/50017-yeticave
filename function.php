<?php
function makeTemplate($templateFile, $templateData)
{

    if (file_exists($templateFile)) {
        ob_start();
        require_once $templateFile;
        $html = ob_get_clean();
        return $html;
    } else {
        return "";
    }
}
