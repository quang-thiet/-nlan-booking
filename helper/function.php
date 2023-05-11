<?php

function generate_order_code()
{
    $str_random = uniqid();
    $code = strtoupper(substr($str_random, 6, 6));
    return 'o' . $code;
}

function formatVND($price){
    $symbol = 'đ';
    $symbol_thousand = '.';
    $decimal_place = 0;
    $price = number_format($price, $decimal_place, '', $symbol_thousand);
    return $price.$symbol;
}