<?php

if (!function_exists('input_date')) {
    function input_date($date, $format = 'd/m/Y')
    {
        return empty($date) || $date == '0000-00-00' || $date == '0000-00-00 00:00:00' ? '' : date($format, strtotime($date));
    }
}

function testHelper()
{
    return 'ok';
}
