<?php 

function ascii($value)
{
    foreach (chars_array() as $key => $val) {
        $value = str_replace($val, $key, $value);
    }
    return preg_replace('/[^\x20-\x7E]/u', '', $value);
}