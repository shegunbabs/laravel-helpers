<?php

function ordinal($number)
{
    if ( is_int($number) ){
        $out = new NumberFormatter("en_us", NumberFormatter::ORDINAL);
        return $out->format($number);
    }
}