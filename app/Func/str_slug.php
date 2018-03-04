<?php

function str_slug($title, $separator = '-')
{
	$title = ascii($title);
    $flip  = $separator == '-' ? '_' : '-';
    $title = preg_replace('!['.preg_quote($flip).']+!u', $separator, $title);
    
    $title = preg_replace('![^'.preg_quote($separator).'\pL\pN\s]+!u', '', mb_strtolower($title));
    $title = preg_replace('!['.preg_quote($separator).'\s]+!u', $separator, $title);
    
    return trim($title, $separator);
}