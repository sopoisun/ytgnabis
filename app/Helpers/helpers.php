<?php

function set_active($path, $active = 'active')
{
    return call_user_func_array('Request::is', (array)$path) ? $active : '';
}

function limit_post($str, $length = 650)
{
    return str_limit(strip_tags($str), $length);
}
