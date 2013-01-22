<?php

function print_pre($array)
{
    print("<pre>");
    $output = print_r($array, true);
    print(htmlspecialchars($output));
    print("</pre>");
}

function parse_ini_file_ext($file, $sections = null)
{
    ob_start();
    include $file;
    $str = ob_get_contents();
    ob_end_clean();
    return parse_ini_string($str, $sections);
}

?>
